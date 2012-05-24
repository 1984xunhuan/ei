<?php

class NewsDAO extends BaseDAO
{
    /**
     --flag: 0: 普通 1： 首页  2：首页图片
     
     DROP TABLE IF EXISTS `tb_news`;
      
     create table tb_news 
     (
     news_id integer not null auto_increment, 
     title varchar(200), 
     content text, 
     promulgator varchar(60), 
     issue_time datetime, 
     click_times integer, 
     status varchar(20), 
     flag varchar(10), 
     pic_url varchar(100), 
     item_id integer, 
     primary key (news_id))
     */
    
    public static $ALL_FLAG       = -1;
    public static $NORMAL_FLAG    = 0;
    public static $INDEX_FLAG     = 1;
    public static $INDEX_PIC_FLAG = 2;
    
    public function get_web_index_pic_news_list()
    {
        $this->open_connect();

        $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
        $sql .= "WHERE status = '0' AND flag = '2' ORDER BY issue_time DESC  limit 10";
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("picture news is not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
        
        $news_list = array();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $news_view = new NewsView();
            
            $news_view->news_id     = $rs['news_id'];
            $news_view->title       = $rs['title'];
            $news_view->content     = $rs['content'];          
            $news_view->promulgator = $rs['promulgator'];
            $news_view->issue_time  = $rs['issue_time'];
            $news_view->click_times = $rs['click_times'];
            $news_view->status      = $rs['status'];
            $news_view->flag        = $rs['flag'];
            $news_view->pic_url     = $rs['pic_url'];
            $news_view->item_id     = $rs['item_id'];
            
            array_push($news_list, $news_view);
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $news_list;
    }

    public function get_news_list_by_item_id($item_id, $flag=self::ALL_FLAG, &$page=NULL,$current_page=1)
    {
        $this->open_connect();
        
        $sql = "";
        
        if($flag == self::$INDEX_FLAG)
        {
            $sql = "SELECT count(0) FROM tb_news ";
            $sql .= "WHERE flag = '1' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else if($flag == self::$INDEX_PIC_FLAG)
        {
            $sql = "SELECT count(0) FROM tb_news ";
            $sql .= "WHERE flag = '2' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql = "SELECT count(0) FROM tb_news ";
            $sql .= "WHERE flag = '0' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else
        {
            $sql = "SELECT count(0) FROM tb_news ";
            $sql .= "WHERE status ='0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        
        Log::debug($sql);
        
        $result  = $this->db->query($sql);
        
        $row_num = $this->db->result($result);
        
        Log::debug("row_num=".$row_num);
        
        $this->free_result($result);
        
        if($page == NULL)
        {
            $page = new Page();
        }

        $page->set_current_page($current_page);
        $page->set_row_num($row_num);
        $page->cal();
        
        
        if($flag == self::$INDEX_FLAG)
        {
            $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
            $sql .= "WHERE flag = '1' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";   
        }
        else if($flag == self::$INDEX_PIC_FLAG)
        {
            $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
            $sql .= "WHERE flag = '2' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";   
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
            $sql .= "WHERE flag = '0' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else
        {
            $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
            $sql .= "WHERE status ='0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        
        $sql .= " limit ".$page->start_row.", ".$page->page_size;
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("item_id=$item_id not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
        
        $news_list = array();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $news_view = new NewsView();
            
            $news_view->news_id     = $rs['news_id'];
            $news_view->title       = $rs['title'];
            $news_view->content     = $rs['content'];          
            $news_view->promulgator = $rs['promulgator'];
            $news_view->issue_time  = $rs['issue_time'];
            $news_view->click_times = $rs['click_times'];
            $news_view->status      = $rs['status'];
            $news_view->flag        = $rs['flag'];
            $news_view->pic_url     = $rs['pic_url'];
            $news_view->item_id     = $rs['item_id'];
            
            array_push($news_list, $news_view);
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $news_list;
    }
    
    public function get_news_by_id($news_id)
    {
        $this->open_connect();

        $sql = "SELECT news_id, title, content, promulgator, issue_time, click_times, status, flag, pic_url, item_id FROM tb_news ";
        $sql .= "WHERE status ='0' AND news_id='".$news_id."' limit 1";
    
        Log::debug($sql);
    
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("news_id=$news_id not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
       $news_view = new NewsView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $news_view->news_id     = $rs['news_id'];
            $news_view->title       = $rs['title'];
            $news_view->content     = $rs['content'];
            $news_view->promulgator = $rs['promulgator'];
            $news_view->issue_time  = $rs['issue_time'];
            $news_view->click_times = $rs['click_times'];
            $news_view->status      = $rs['status'];
            $news_view->flag        = $rs['flag'];
            $news_view->pic_url     = $rs['pic_url'];
            $news_view->item_id     = $rs['item_id'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $news_view;
    }
    
    public function save_news($news_view)
    {
        $this->open_connect();
        
        $sql  = " INSERT INTO `tb_news`(`title`,`content`,`promulgator`,`issue_time`,`click_times`,`status`,`flag`,`pic_url`,`item_id`)";
        $sql .= " VALUES (";
        $sql .= "'".$news_view->title."',";
        $sql .= "'".$news_view->content."',";
        $sql .= "'".$news_view->promulgator."',now(),'0',";
        $sql .= "'".$news_view->status."',";
        $sql .= "'".$news_view->flag."',";
        $sql .= "'".$news_view->pic_url."',";
        $sql .= "'".$news_view->item_id."')";
    
        Log::debug ($sql);
    
        $this->db->query ($sql);
    
        $this->close_connect();
    
        return true;
    }
}

?>