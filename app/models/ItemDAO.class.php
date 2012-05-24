<?php

class ItemDAO extends BaseDAO
{

    /**
     --item_type: 0 Normal 1 introduction 2 news 3 product  4 bbs  5 contact us
     --item_up_id: -1: root node
     --item_site: 1: web 2: wap 3: sms
     DROP TABLE IF EXISTS `tb_item`;
    
     CREATE TABLE `tb_item` (
     `item_id` int(11) NOT NULL auto_increment,
     `item_name` varchar(20) collate utf8_bin NOT NULL,
     `item_seq` int(11) default NULL,
     `item_level` int(11) default NULL,
     `item_up_id` int(11) default NULL,
     `item_content` text collate utf8_bin,
     `item_reg_time` datetime default NULL,
     `item_status` varchar(20) collate utf8_bin default NULL,
     `item_type` int(11) default NULL,
     `item_site` int(11) default NULL,
     PRIMARY KEY  (`item_id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
    
     insert  into `tb_item`(`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`,`item_site`) values ('WEB',0,0,-1,'',now(),'0',0,1);
     insert  into `tb_item`(`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`,`item_site`) values ('WAP',0,0,-1,'',now(),'0',0,2);
    
     * */
    
    private $item_view;
    
    public function set_item_view($item_view)
    {
        $this->item_view = $item_view;
    }
    
    public function get_web_index_info()
    {
        return $this->get_index_info('1');
    }
    
    public function get_wap_index_info()
    {
        return $this->get_index_info('2');
    }
    
    private function get_index_info($site_type)
    {
        $this->open_connect();
    
        $sql  = " SELECT item_id FROM tb_item ";
        $sql .= " WHERE item_up_id= -1 AND item_site='".$site_type."' limit 1";
    
        Log::debug ( $sql );
    
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("item_up_id=-1 not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
        $item_id = $this->db->result($result);
    
        $this->free_result($result);
    
        $sql  = " SELECT item_id, item_type, item_name, item_seq, item_content, item_up_id FROM tb_item ";
        $sql .= " WHERE item_status=0 AND item_up_id=".$item_id." ORDER BY item_seq ASC";
    
        Log::debug ($sql);
    
        $result  = $this->db->query ($sql);
        //$row_num = $this->db->num_rows($result);
    
        //Log::debug ("row_num=".$row_num);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("item_up_id=$item_id not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
        $index_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            Log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $indexs = new IndexView();
    
            $indexs->item->item_id      = $rs['item_id'];
            $indexs->item->item_name    = $rs['item_name'];
            $indexs->item->item_type    = $rs['item_type'];
            $indexs->item->item_seq     = $rs['item_seq'];
            $indexs->item->item_content = $rs['item_content'];
            $indexs->item->item_up_id   = $rs['item_up_id'];

            array_push($index_results, $indexs);
        }
    
        $this->free_result($result);
        $this->close_connect();
        
        foreach($index_results as $indexs)
        {
            if ($indexs->item->item_type == 1)
            {
                $introduction_dao = new IntroductionDAO();
            
                $indexs->introduction = $introduction_dao->get_introduction_by_item_id($indexs->item->item_id);
            }
            else if ($indexs->item->item_type == 2)
            {
                $news_dao = new NewsDAO();
            
                $indexs->news_list = $news_dao->get_news_list_by_item_id($indexs->item->item_id, NewsDAO::$INDEX_FLAG);
            }
            else if ($indexs->item->item_type == 3)
            {
                $product_dao = new ProductDAO();
            
                $indexs->product_list = $product_dao->get_product_list_by_item_id($indexs->item->item_id, ProductDAO::$INDEX_FLAG);
            }
            else if ($indexs->item->item_type == 4)
            {
                $subject_dao = new SubjectDAO();
                $indexs->subject_list = $subject_dao->get_subject_list_by_item_id($indexs->item->item_id, SubjectDAO::$INDEX_FLAG);
            }
            else if ($indexs->item->item_type == 5)
            {
                $merchant_dao = new MerchantDAO();
                $indexs->merchant = $merchant_dao->get_merchant();
            }  
        }
    
        return $index_results;
    }
    
    public function get_web_index_menu()
    {
        return $this->get_index_menu('1');
    }
    
    public function get_wap_index_menu()
    {
        return $this->get_index_menu('2');
    }
    
    private function get_index_menu($site_type)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id FROM tb_item ";
        $sql .= "WHERE item_up_id= -1 AND item_site='".$site_type."' limit 1";
    
        Log::debug($sql);
    
        $result = $this->db->query($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("item_up_id=-1 not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }

        $item_id = $this->db->result($result);
    
        $this->free_result($result);
    
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content, item_up_id FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_up_id=".$item_id." ORDER BY item_seq ASC";
    
        Log::debug ($sql);
    
        $result  = $this->db->query($sql);
    
        $item_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            Log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $item = new ItemView();
    
            $item->item_id      = $rs['item_id'];
            $item->item_name    = $rs['item_name'];
            $item->item_type    = $rs['item_type'];
            $item->item_seq     = $rs['item_seq'];
            $item->item_content = $rs['item_content'];
            $item->item_up_id   = $rs['item_up_id'];
    
            array_push($item_results, $item);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item_results;
    }
    
    public function get_admin_menu($site_type)
    {
        $this->open_connect();
    
        /*
        $sql = "SELECT item_id FROM tb_item ";
        $sql .= "WHERE item_up_id='-1' AND item_site='".$site_type."' limit 1";
    
        Log::debug($sql);
    
        $result = $this->db->query($sql);
    
        if(empty($result))
        {
            Log::error("item_up_id=-1 not found, please check check database");
    
            return null;
        }
    
        $item_id = $this->db->result($result);
    
        $this->free_result($result);
        */
    
        /*
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content, item_up_id FROM tb_item ";
        $sql .= "WHERE item_status=0 AND ((item_up_id='-1' AND item_site='".$site_type."') OR item_up_id=".$item_id.") ORDER BY item_seq ASC";
        */
        
        $sql  = " SELECT b.item_id, b.item_up_id, b.item_type, b.item_name, b.item_seq, b.item_content,b.item_site FROM tb_item a, tb_item b ";
        $sql .= " WHERE a.item_id = b.item_up_id and  b.item_site=$site_type ";
        $sql .= " UNION (";
        $sql .= " SELECT c.item_id, c.item_up_id, c.item_type, c.item_name, c.item_seq, c.item_content, c.item_site FROM tb_item c";
        $sql .= " WHERE c.item_up_id=-1 and c.item_site=$site_type )";
        
        /*
        $sql  = " SELECT b.item_id, b.item_type, b.item_name, b.item_seq, b.item_content, b.item_up_id FROM tb_item a, tb_item b";
        $sql .= " WHERE a.item_id = b.item_up_id and b.item_site=".$site_type." ORDER BY b.item_seq ASC";
        */
    
        //Log::out_print($sql);
        Log::debug ($sql);
    
        $result  = $this->db->query($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("Data not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
        $item_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            Log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $item = new ItemView();
    
            $item->item_id      = $rs['item_id'];
            $item->item_name    = $rs['item_name'];
            $item->item_type    = $rs['item_type'];
            $item->item_seq     = $rs['item_seq'];
            $item->item_content = $rs['item_content'];
            $item->item_up_id   = $rs['item_up_id'];
            
            array_push($item_results, $item);      
        }
    
        $this->free_result($result);
        $this->close_connect();

        return $item_results;
    }
    
    public function get_item_by_up_id($item_up_id)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id, item_name, item_seq, item_level, item_up_id, item_content, item_reg_time, item_status, item_type, item_site FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_up_id=".$item_up_id." ORDER BY item_seq ASC";
    
        Log::debug ($sql);
    
        $result  = $this->db->query ($sql);
    
        $item_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            Log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $item = new ItemView();
    
            $item->item_id       = $rs['item_id'];
            $item->item_name     = $rs['item_name'];
            $item->item_seq      = $rs['item_seq'];
            $item->item_level    = $rs['item_level'];
            $item->item_up_id    = $rs['item_up_id'];
            $item->item_content  = $rs['item_content'];
            $item->item_reg_time = $rs['item_reg_time'];
            $item->item_status   = $rs['item_status'];
            $item->item_type     = $rs['item_type'];
            $item->item_site     = $rs['item_site'];
    
            array_push($item_results, $item);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item_results;
    }
    
    public function get_item_by_id($item_id)
    {
        $this->open_connect();    
    
        $sql = "SELECT item_id, item_name, item_seq, item_level, item_up_id, item_content, item_reg_time, item_status, item_type, item_site FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_id=".$item_id." limit 1";
    
        Log::debug ($sql);
    
        $result  = $this->db->query ($sql);
    
        $item = new ItemView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            Log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $item->item_id       = $rs['item_id'];
            $item->item_name     = $rs['item_name'];
            $item->item_seq      = $rs['item_seq'];
            $item->item_level    = $rs['item_level'];
            $item->item_up_id    = $rs['item_up_id'];
            $item->item_content  = $rs['item_content'];
            $item->item_reg_time = $rs['item_reg_time'];
            $item->item_status   = $rs['item_status'];
            $item->item_type     = $rs['item_type'];
            $item->item_site     = $rs['item_site'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item;
    }
    
    public function save_item()
    { 
        //print_r($this->item_view);
        Log::out_print($this->item_view->item_name);
        Log::out_print($this->item_view->item_seq);
        Log::out_print($this->item_view->item_level);
        Log::out_print($this->item_view->item_up_id);
        Log::out_print($this->item_view->item_content);
        Log::out_print($this->item_view->item_type);

            
        $this->open_connect();
        
        $sql  = " INSERT INTO `tb_item`(`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`,`item_site`)";
        $sql .= " VALUES (";
        $sql .= "'".$this->item_view->item_name."',";
        $sql .= "'".$this->item_view->item_seq."',";
        $sql .= "'".$this->item_view->item_level."',";
        $sql .= "'".$this->item_view->item_up_id."',";
        $sql .= "'".$this->item_view->item_content."',now(),'0',";
        $sql .= "'".$this->item_view->item_type."',";
        $sql .= "'".$this->item_view->item_site."')";
        
       
        Log::debug ($sql);
        
        Log::out_print($sql);
        
        $this->db->query ($sql);
       
        $this->close_connect();
        
        return true;
    }
    
    public function update_item()
    {
        $this->open_connect();
                
        $sql  = " UPDATE tb_item SET ";
        $sql .= " item_name='".$this->item_view->item_name."',";
        $sql .= " item_seq='".$this->item_view->item_seq."',";
        $sql .= " item_level='".$this->item_view->item_level."',";
        $sql .= " item_up_id='".$this->item_view->item_up_id."',";
        $sql .= " item_content='".$this->item_view->item_content."',";
        $sql .= " item_reg_time='".$this->item_view->item_reg_time."',";
        $sql .= " item_status='".$this->item_view->item_status."',";
        $sql .= " item_type='".$this->item_view->item_type."' ";
        $sql .= " WHERE item_id='".$this->item_view->item_id."'";
        
        Log::out_print($sql);
        
        Log::debug ($sql);
        
        $this->db->query ($sql);
        
        $this->close_connect();
        
        return true;
    }
    
    public function delete_item($item_id, $merchant_id)
    {
        /*
        --item_type: 0 Normal 1 introduction 2 news 3 product  4 bbs  5 link us
        --item_up_id: -1: root node
        */
        $item = $this->get_item_by_id($item_id);
        
        if($item->item_up_id == -1)
        {
            Log::debug("Root node don't delete.");
            
            return false;
        }      
        
        $delpath = '';
        
        $this->open_connect();
        
        $this->db->query("BEGIN");
        
        switch ($item->item_type)
        {
            case 1:
                $sql = "DELETE FROM tb_introduction WHERE item_id='".$item_id."'";
                
                Log::debug ($sql);
                $this->db->query ($sql);
                
                break;
            case 2:
                $sql = "DELETE FROM tb_news WHERE item_id='".$item_id."'";
                
                Log::debug ($sql);
                $this->db->query ($sql);
                
                $delpath = "/public/data/".$merchant_id."/news/".$item_id."/";
                
                break;
            case 3:
                $sql = "DELETE FROM tb_product WHERE item_id='".$item_id."'";
                
                Log::debug ($sql);
                $this->db->query ($sql);
                
                $delpath = "/public/data/".$merchant_id."/product/".$item_id."/";
                
                break;
            case 4:
                $subjectDAO = new SubjectDAO();
                
                $subjectView = $subjectDAO->get_subject_by_id($item_id);
                
                $sql = "DELETE FROM tb_post WHERE post_subject_id='".$subjectView->subject_id."'";
                
                Log::debug ($sql);
                $this->db->query ($sql);               
                
                $sql = "DELETE FROM tb_subject WHERE subject_item_id='".$item_id."'";
                
                Log::debug ($sql);
                $this->db->query ($sql);
                
                break;
            case 5:
                break;
        }
        
        $sql  = " DELETE FROM tb_item ";
        $sql .= " WHERE item_id='".$item_id."'";
    
        Log::debug ($sql);
        $this->db->query ($sql);
        
        $this->db->query("COMMIT");
        $this->db->query("END");

        //remove files
        if($item->item_type == 2 || $item->item_type == 3)
        {
            Util::delete_directory(Util::get_deploy_path().$delpath);
        }
    
        $this->close_connect();      
        
    
        return true;
    }
}

?>