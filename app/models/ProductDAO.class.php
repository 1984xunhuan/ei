<?php

class ProductDAO extends BaseDAO
{

    /**
     --flag: 0: 普通 1： 首页 
    
     DROP TABLE IF EXISTS `tb_product`;
    
     create table tb_product 
     (
     product_id integer not null auto_increment, 
     product_name varchar(200), 
     description text, 
     promulgator varchar(60), 
     issue_time datetime, 
     click_times integer, 
     status varchar(20), 
     flag varchar(10), 
     icon_url varchar(100), 
     pic_url varchar(100), 
     item_id integer, 
     primary key (product_id))

     */
    
    public static $ALL_FLAG       = -1;
    public static $NORMAL_FLAG    = 0;
    public static $INDEX_FLAG     = 1;
    
    public function get_product_list_by_item_id($item_id, $flag=self::ALL_FLAG, &$page=NULL,$current_page=1)
    {
        $this->open_connect();
    
        $sql = "";
        
        if($flag == self::$INDEX_FLAG)
        {
            $sql = "SELECT count(0) FROM tb_product ";
            $sql .= "WHERE flag = '1' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql = "SELECT count(0) FROM tb_product ";
            $sql .= "WHERE flag = '0' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else
        {
            $sql = "SELECT count(0) FROM tb_product ";
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
            $sql = "SELECT product_id, product_name, description, promulgator, issue_time, click_times, status, flag, icon_url, pic_url, item_id FROM tb_product ";
            $sql .= "WHERE flag = '1' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql = "SELECT product_id, product_name, description, promulgator, issue_time, click_times, status, flag, icon_url, pic_url, item_id FROM tb_product ";
            $sql .= "WHERE flag = '0' AND status = '0' AND item_id='".$item_id."' ORDER BY issue_time DESC";
        }
        else 
        {
            $sql = "SELECT product_id, product_name, description, promulgator, issue_time, click_times, status, flag, icon_url, pic_url, item_id FROM tb_product ";
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
    
        $product_list = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $product_view = new ProductView();
    
            $product_view->product_id   = $rs['product_id'];
            $product_view->product_name = $rs['product_name'];
            $product_view->description  = $rs['description'];
            $product_view->promulgator  = $rs['promulgator'];
            $product_view->issue_time   = $rs['issue_time'];
            $product_view->click_times  = $rs['click_times'];
            $product_view->status       = $rs['status'];
            $product_view->flag         = $rs['flag'];
            $product_view->icon_url     = $rs['icon_url'];
            $product_view->pic_url      = $rs['pic_url'];
            $product_view->item_id      = $rs['item_id'];
    
            array_push($product_list, $product_view);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $product_list;
    }
    
    public function get_product_by_id($product_id)
    {
        $this->open_connect();
    
        $sql = "SELECT product_id, product_name, description, promulgator, issue_time, click_times, status, flag, icon_url, pic_url, item_id FROM tb_product ";
        $sql .= "WHERE status ='0' AND product_id='".$product_id."' limit 1";
    
        Log::debug($sql);
    
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("product_id=$product_id not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
       $product_view = new ProductView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $product_view->product_id   = $rs['product_id'];
            $product_view->product_name = $rs['product_name'];
            $product_view->description  = $rs['description'];
            $product_view->promulgator  = $rs['promulgator'];
            $product_view->issue_time   = $rs['issue_time'];
            $product_view->click_times  = $rs['click_times'];
            $product_view->status       = $rs['status'];
            $product_view->flag         = $rs['flag'];
            $product_view->icon_url     = $rs['icon_url'];
            $product_view->pic_url      = $rs['pic_url'];
            $product_view->item_id      = $rs['item_id'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $product_view;
    }
    
    public function save_product($product_view)
    {
        $this->open_connect();
        
        $sql  = " INSERT INTO `tb_product`(`product_name`,`description`,`promulgator`,`issue_time`,`click_times`,`status`,`flag`,`icon_url`,`pic_url`,`item_id`)";
        $sql .= " VALUES (";
        $sql .= "'".$product_view->product_name."',";
        $sql .= "'".$product_view->description."',";
        $sql .= "'".$product_view->promulgator."',now(),'0',";
        $sql .= "'".$product_view->status."',";
        $sql .= "'".$product_view->flag."',";
        $sql .= "'".$product_view->icon_url."',";
        $sql .= "'".$product_view->pic_url."',";
        $sql .= "'".$product_view->item_id."')";
        
        Log::debug ($sql);
        
        Log::out_print($sql);
        
        $this->db->query ($sql);
        
        $this->close_connect();
        
        return true;
    }
}

?>