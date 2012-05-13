<?php

class SubjectDAO extends BaseDAO
{

    /**
    CREATE TABLE `tb_subject` (
      `subject_id` int(11) NOT NULL auto_increment,
      `subject_topic` varchar(20) collate utf8_bin NOT NULL,
      `subject_user_id` varchar(20) collate utf8_bin NOT NULL,
      `subject_item_id` int(11) NOT NULL,
      `subject_reply_num` int(11) default NULL,
      `subject_content` text collate utf8_bin,
      `subject_issue_time` datetime default NULL,
      `subject_type` int(11) NOT NULL,
      `subject_flag` varchar(20) collate utf8_bin NOT NULL,
      PRIMARY KEY  (`subject_id`)
       ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
     */
    
    private $subject_view;
    
    public static $ALL_FLAG       = -1;
    public static $NORMAL_FLAG    = 0;
    public static $INDEX_FLAG     = 1;
    
    public function set_subect_view($subject_view)
    {
        $this->subject_view = $subject_view;
    }
    
    public function publish_subject()
    {
        $sql  = " INSERT INTO ";
        $sql .= " tb_subject (subject_topic, subject_user_id, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag,subject_item_id) ";
        $sql .= " VALUES (";
        $sql .= "'".$this->subject_view->subject_topic."', ";
        $sql .= "'".$this->subject_view->subject_user_id."', ";
        $sql .= "'".$this->subject_view->subject_reply_num."', ";
        $sql .= "'".$this->subject_view->subject_content."', ";
        $sql .= "".$this->subject_view->subject_issue_time.", ";
        $sql .= "'".$this->subject_view->subject_type."', ";
        $sql .= "'".$this->subject_view->subject_flag."', ";
        $sql .= "'".$this->subject_view->subject_item_id."' ";
        $sql .= ")";
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $this->db->query($sql);
        
        $this->close_connect();
    }
    
    public function get_subject_by_id($subject_id)
    {
        $this->open_connect();
        
        $sql  = " SELECT subject_id, subject_topic, subject_user_id, u.user_name, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag, subject_item_id FROM tb_subject s, tb_user u ";
        //$sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' ";
        $sql .= " WHERE u.user_id=s.subject_user_id ";
        $sql .= " AND s.subject_id='".$subject_id."'";
        
        Log::debug($sql);
        
        $result = $this->db->query($sql);
        
        if(empty($result))
        {
            Log::error("Data is not found, please check check database");
        
            return null;
        }
        
        $subject_view = new SubjectView();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $subject_view->subject_id         = $rs['subject_id'];
            $subject_view->subject_topic      = $rs['subject_topic'];
            $subject_view->subject_user_id    = $rs['subject_user_id'];
            $subject_view->user_name          = $rs['user_name'];
            $subject_view->subject_reply_num  = $rs['subject_reply_num'];
            $subject_view->subject_content    = $rs['subject_content'];
            $subject_view->subject_issue_time = $rs['subject_issue_time'];
            $subject_view->subject_type       = $rs['subject_type'];
            $subject_view->subject_flag       = $rs['subject_flag'];
            $subject_view->subject_item_id    = $rs['subject_item_id'];
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $subject_view;
    }
    
    /*
    public function subject_list(&$page=NULL,$current_page=1)
    {
        $this->open_connect();
        $sql  = " SELECT COUNT(0) FROM tb_subject s, tb_user u ";
        $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' ORDER BY subject_issue_time DESC";
        
        Log::debug($sql);
        
        $result  = $this->db->query($sql);
        
        $row_num = $this->db->result($result);
        
        $this->db->free_result($result);
        
        if($page == NULL)
        {
            $page = new page();
        }
        
        $page->set_current_page($current_page);
        $page->set_row_num($row_num);
        $page->cal();
        
        $sql  = " SELECT subject_id, subject_topic, subject_user_id, u.user_name, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag FROM tb_subject s, tb_user u ";
        $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' ORDER BY subject_issue_time DESC ";
        $sql .= " limit ".$page->start_row.", ".$page->page_size;
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if(empty($result))
        {
            Log::error("Data is not found, please check check database");
        
            return null;
        }
        
        $subject_list = array();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $subject_view = new SubjectView();
        
            $subject_view->subject_id         = $rs['subject_id'];
            $subject_view->subject_topic      = $rs['subject_topic'];
            $subject_view->subject_user_id    = $rs['subject_user_id'];
            $subject_view->user_name          = $rs['user_name'];
            $subject_view->subject_reply_num  = $rs['subject_reply_num'];
            $subject_view->subject_content    = $rs['subject_content'];
            $subject_view->subject_issue_time = $rs['subject_issue_time'];
            $subject_view->subject_type       = $rs['subject_type'];
            $subject_view->subject_flag       = $rs['subject_flag'];
        
            array_push($subject_list, $subject_view);
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $subject_list;
    }
    */
    
    public function get_subject_list_by_item_id($item_id, $flag=self::ALL_FLAG, &$page=NULL,$current_page=1)
    {
        $this->open_connect();
        
        $sql = "";
        
        if($flag == self::$INDEX_FLAG)
        {
            $sql  = " SELECT COUNT(0) FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql  = " SELECT COUNT(0) FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        else
        {
            $sql  = " SELECT COUNT(0) FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        
        Log::debug($sql);
        
        $result  = $this->db->query($sql);
        
        $row_num = $this->db->result($result);
        
        $this->db->free_result($result);
        
        if($page == NULL)
        {
            $page = new Page();
        }
        
        $page->set_current_page($current_page);
        $page->set_row_num($row_num);
        $page->cal();
        
        
        
        if($flag == self::$INDEX_FLAG)
        {
            $sql  = " SELECT subject_id, subject_topic, subject_user_id, u.user_name, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag, subject_item_id FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        else if($flag == self::$NORMAL_FLAG)
        {
            $sql  = " SELECT subject_id, subject_topic, subject_user_id, u.user_name, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag, subject_item_id FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_flag = '0' AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        else
        {
            $sql  = " SELECT subject_id, subject_topic, subject_user_id, u.user_name, subject_reply_num, subject_content, subject_issue_time, subject_type, subject_flag, subject_item_id FROM tb_subject s, tb_user u ";
            $sql .= " WHERE u.user_id=s.subject_user_id AND subject_item_id='".$item_id."' ORDER BY subject_issue_time DESC";
        }
        
        $sql .= " limit ".$page->start_row.", ".$page->page_size;
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if(empty($result))
        {
            Log::error("item_id=$item_id not found, please check check database");
        
            return null;
        }
        
        $subject_list = array();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $subject_view = new SubjectView();
        
            $subject_view->subject_id         = $rs['subject_id'];
            $subject_view->subject_topic      = $rs['subject_topic'];
            $subject_view->subject_user_id    = $rs['subject_user_id'];
            $subject_view->user_name          = $rs['user_name'];
            $subject_view->subject_reply_num  = $rs['subject_reply_num'];
            $subject_view->subject_content    = $rs['subject_content'];
            $subject_view->subject_issue_time = $rs['subject_issue_time'];
            $subject_view->subject_type       = $rs['subject_type'];
            $subject_view->subject_flag       = $rs['subject_flag'];
            $subject_view->subject_item_id    = $rs['subject_item_id'];
        
            array_push($subject_list, $subject_view);
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $subject_list;
    }
}

?>