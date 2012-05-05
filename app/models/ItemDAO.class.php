<?php

class ItemDAO extends BaseDAO
{

    /**
     --item_type: 0锛氭櫘閫� 1锛氫粙缁�  2锛� 鏂伴椈 3锛氫骇鍝�  4锛氳仈绯绘垜浠� 5锛氱暀瑷�
     --item_up_id: 0: 鏍硅妭鐐� 锛岄粯璁ゅ繀椤绘湁涓�涓负0鐨勩��
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
     PRIMARY KEY  (`item_id`)
     ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
    
     insert  into `tb_item`(`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`) values ('WEB',0,0,0,'',now(),'0',0);
     insert  into `tb_item`(`item_name`,`item_seq`,`item_level`,`item_up_id`,`item_content`,`item_reg_time`,`item_status`,`item_type`) values ('WAP',0,0,0,'',now(),'0',0);
    
     * */
    
    public function get_web_index_info()
    {
        return $this->get_index_info('WEB');
    }
    
    public function get_wap_index_info()
    {
        return $this->get_index_info('WAP');
    }
    
    private function get_index_info($site_type)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id FROM tb_item ";
        $sql .= "WHERE item_up_id= 0 AND item_name='".$site_type."' limit 1";
    
        log::debug ( $sql );
    
        $result = $this->db->query ($sql);
    
        if(empty($result))
        {
            log::error("item_up_id=0 not found, please check check database");
    
            return null;
        }
    
        $item_id = $this->db->result($result);
    
        $this->free_result($result);
    
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_up_id=".$item_id." ORDER BY item_seq ASC";
    
        log::debug ($sql);
    
        $result  = $this->db->query ($sql);
        //$row_num = $this->db->num_rows($result);
    
        //log::debug ("row_num=".$row_num);
    
        $index_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            log::debug('item_id='.$rs['item_id'].'    '.
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
    
            if ($indexs->item->item_type == 1)
            {
                //$introduction_dao = new introduction_dao;
    
               // $indexs->introduction = $introduction_dao->get_introduction_by_item_id($indexs->item->item_id);
            }
            else if ($indexs->item->item_type == 2)
            {
                //$news_dao = new news_dao();
    
                //$indexs->news_list = $news_dao->get_news_list_by_item_id($indexs->item->item_id, news_dao::$INDEX_FLAG);
            }
            else if ($indexs->item->item_type == 3)
            {
               // $product_dao = new product_dao();
    
               // $indexs->product_list = $product_dao->get_product_list_by_item_id($indexs->item->item_id, product_dao::$INDEX_FLAG);
            }
            else if ($indexs->item->item_type == 4)
            {
                //$merchant_dao = new merchant_dao();
                //$indexs->merchant = $merchant_dao->get_merchant();
            }
            else if ($indexs->item->item_type == 5)
            {
    
            }
    
            array_push($index_results, $indexs);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $index_results;
    }
    
    public function get_web_index_menu()
    {
        return $this->get_index_menu('WEB');
    }
    
    public function get_wap_index_menu()
    {
        return $this->get_index_menu('WAP');
    }
    
    private function get_index_menu($site_type)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id FROM tb_item ";
        $sql .= "WHERE item_up_id= 0 AND item_name='".$site_type."' limit 1";
    
        log::debug($sql);
    
        $result = $this->db->query($sql);
    
        if(empty($result))
        {
            log::error("item_up_id=0 not found, please check check database");
    
            return null;
        }
    
        $item_id = $this->db->result($result);
    
        $this->free_result($result);
    
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_up_id=".$item_id." ORDER BY item_seq ASC";
    
        log::debug ($sql);
    
        $result  = $this->db->query($sql);
    
        $item_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            log::debug('item_id='.$rs['item_id'].'    '.
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
    
            array_push($item_results, $item);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item_results;
    }
    
    public function get_item_by_up_id($item_up_id)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_up_id=".$item_up_id." ORDER BY item_seq ASC";
    
        log::debug ($sql);
    
        $result  = $this->db->query ($sql);
    
        $item_results = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            log::debug('item_id='.$rs['item_id'].'    '.
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
    
            array_push($item_results, $item);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item_results;
    }
    
    public function get_item_by_id($item_id)
    {
        $this->open_connect();
    
        $sql = "SELECT item_id, item_type, item_name, item_seq, item_content FROM tb_item ";
        $sql .= "WHERE item_status=0 AND item_id=".$item_id." limit 1";
    
        log::debug ($sql);
    
        $result  = $this->db->query ($sql);
    
        $item = new ItemView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            log::debug('item_id='.$rs['item_id'].'    '.
                    'item_name='.$rs['item_name'].'    '.
                    'item_type='.$rs['item_type'].'    '.
                    'item_seq='.$rs['item_seq'].'    '.
                    'item_content='.$rs['item_content']);
    
            $item->item_id      = $rs['item_id'];
            $item->item_name    = $rs['item_name'];
            $item->item_type    = $rs['item_type'];
            $item->item_seq     = $rs['item_seq'];
            $item->item_content = $rs['item_content'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $item;
    }
}

?>