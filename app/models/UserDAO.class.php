<?php

class UserDAO extends BaseDAO
{

    /**
     * 
      --user_type: 0: register user, 1 administrator user
      
      CREATE TABLE tb_user
      (
      user_id varchar(20) not null,
      user_name varchar(20) not null,
      user_password varchar(20) not null,
      user_reg_time datetime,
      user_level int,
      user_status int,
      user_reg_ip varchar(20),
      user_login_ip varchar(20),
      user_last_active_time datetime,
      user_last_login_time datetime,
      user_type int default 0,
      PRIMARY KEY  (user_id)
      );  
     */

    public static $REGISTER_USER      = 0;
    public static $ADMINISTRATOR_USER = 1;
    
    private $user_view;
    
    public function set_user_view($user_view)
    {
        $this->user_view = $user_view;
    }
    
    public function had_registered($user_name)
    {
        $sql  = " SELECT COUNT(0) FROM tb_user ";
        $sql .= " WHERE ";
        $sql .= " user_name='".$user_name."'";
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $result = $this->db->query($sql);
        
        $count = $this->db->result($result);
        
        $this->db->free_result($result);
        
        $this->close_connect();
        
        if($count == 0)
        {
            return false;
        }
        else
        {
            return true;
        }      
    }
    
    public function register_user_info()
    {
        $sql  = " INSERT INTO ";
        $sql .= " tb_user (user_id, user_name, user_password, user_reg_time, user_level, user_status, user_reg_ip, user_login_ip, user_last_active_time, user_last_login_time, user_type) ";
        $sql .= " VALUES (";
        $sql .= "'".$this->user_view->user_id."', ";
        $sql .= "'".$this->user_view->user_name."', ";
        $sql .= "'".$this->user_view->user_password."', ";
        $sql .= "".$this->user_view->user_reg_time.", ";
        $sql .= "'".$this->user_view->user_level."', ";
        $sql .= "'".$this->user_view->user_status."', ";
        $sql .= "'".$this->user_view->user_reg_ip."', ";
        $sql .= "'".$this->user_view->user_login_ip."', ";
        $sql .= "".$this->user_view->user_last_active_time.", ";
        $sql .= "".$this->user_view->user_last_login_time.",";
        $sql .= "".$this->user_view->user_type." ";
        $sql .= ")";
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $this->db->query($sql);
       
        $this->close_connect();
    }
    
    public function login($user_type=self::REGISTER_USER)
    {
        $sql  = " SELECT user_id FROM tb_user ";
        $sql .= " WHERE ";
        $sql .= " user_name='".$this->user_view->user_name."'";
        $sql .= " AND ";
        $sql .= " user_password='".$this->user_view->user_password."'";
        $sql .= " AND ";
        $sql .= " user_type=".$user_type;
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $result = $this->db->query($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            $this->close_connect();
            
            return false;
        }
        
        $user_id = $this->db->result($result);
        
        $this->db->free_result($result);
        
        if($user_id == null || empty($user_id))
        {
            $this->close_connect();
            
            return false;
        }
        
        $sql  = " UPDATE ";
        $sql .= " tb_user ";
        $sql .= " SET";
        $sql .= " user_login_ip='".$this->user_view->user_login_ip."', ";
        $sql .= " user_last_login_time=".$this->user_view->user_last_login_time." ";
        $sql .= " WHERE ";
        $sql .= " user_id='".$user_id."'";
        //$sql .= " user_name='".$this->user_view->user_name."'";
        
        Log::debug($sql);
        
        
        $this->db->query($sql);
        
        $this->close_connect();
        
        $user_view = $this->get_user_by_id($user_id);
        
        if($user_type == self::$ADMINISTRATOR_USER)
        {
            $_SESSION["ADMIN_USER"] = $user_view;
        }
        else if($user_type == self::$REGISTER_USER)
        {
            $_SESSION["USER_ID"] = $user_id;
            $_SESSION["USER_NAME"] = $this->user_view->user_name;
        }
        
        return true;
    }
    
    public function get_user_list(&$page=NULL,$current_page=1)
    {
        $this->open_connect();
    
        $sql  = " SELECT COUNT(0) FROM tb_user u ";
        $sql .= " WHERE user_type='".$this->user_view->user_type."'";
        $sql .= " ORDER BY user_reg_time DESC";
    
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
    
        $sql  = " SELECT `user_id`,`user_name`,`user_password`,`user_reg_time`,`user_level`,`user_status`,`user_reg_ip`,`user_login_ip`,`user_last_active_time`,`user_last_login_time`, `user_type` FROM tb_user u ";
        $sql .= " WHERE user_type='".$this->user_view->user_type."'";
        $sql .= " ORDER BY user_reg_time DESC";

        $sql .= " limit ".$page->start_row.", ".$page->page_size;
    
        Log::debug($sql);
    
        $result = $this->db->query ($sql);
    
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("Data not found, please check check database");
    
            $this->close_connect();
    
            return null;
        }
    
        $user_list = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $user_view = new UserView();
    
            $user_view->user_id               = $rs['user_id'];
            $user_view->user_name             = $rs['user_name'];
            $user_view->user_password         = $rs['user_password'];
            $user_view->user_reg_time         = $rs['user_reg_time'];
            $user_view->user_level            = $rs['user_level'];
            $user_view->user_status           = $rs['user_status'];
            $user_view->user_reg_ip           = $rs['user_reg_ip'];
            $user_view->user_login_ip         = $rs['user_login_ip'];
            $user_view->user_last_active_time = $rs['user_last_active_time'];
            $user_view->user_last_login_time  = $rs['user_last_login_time'];
            $user_view->user_type             = $rs['user_type'];
    
            array_push($user_list, $user_view);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $user_list;
    }
    
    public function get_user_by_id($user_id)
    {
        $this->open_connect();
    
        $sql  = " SELECT `user_id`,`user_name`,`user_password`,`user_reg_time`,`user_level`,`user_status`,`user_reg_ip`,`user_login_ip`,`user_last_active_time`,`user_last_login_time`,`user_type` FROM tb_user u ";
        $sql .= " WHERE user_id='".$user_id."' LIMIT 1";
    
        Log::debug($sql);
    
        $result = $this->db->query ($sql);
    
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("Data not found, please check check database");
    
            $this->close_connect();
    
            return null;
        }
            
        $user_view = new UserView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
    
            $user_view->user_id               = $rs['user_id'];
            $user_view->user_name             = $rs['user_name'];
            $user_view->user_password         = $rs['user_password'];
            $user_view->user_reg_time         = $rs['user_reg_time'];
            $user_view->user_level            = $rs['user_level'];
            $user_view->user_status           = $rs['user_status'];
            $user_view->user_reg_ip           = $rs['user_reg_ip'];
            $user_view->user_login_ip         = $rs['user_login_ip'];
            $user_view->user_last_active_time = $rs['user_last_active_time'];
            $user_view->user_last_login_time  = $rs['user_last_login_time'];
            $user_view->user_type             = $rs['user_type'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $user_view;
    }
    
    public function delete_user($user_id)
    {
        $this->open_connect();
        
        $this->db->query("BEGIN");
    
        //delete tb_user
        $sql  = " DELETE FROM tb_user";
        $sql .= " WHERE user_id='".$user_id."'";
    
        Log::debug($sql);    
        $this->db->query ($sql);
        
        //delete tb_post that user reply
        $sql  = " DELETE FROM tb_post ";
        $sql .= " WHERE ";
        $sql .= " post_subject_id IN (";
        $sql .= " SELECT subject_id FROM tb_subject";
        $sql .= " WHERE subject_user_id='$user_id')";
        
        Log::debug($sql);
        $this->db->query ($sql);
        
        //delete tb_subject
        $sql  = " DELETE FROM tb_subject";
        $sql .= " WHERE subject_user_id='".$user_id."'";
        
        Log::debug($sql);
        $this->db->query ($sql);
        
        //update subject_reply_num of tb_subject 
        $sql  = " UPDATE tb_subject s SET  subject_reply_num=subject_reply_num-(SELECT count(post_id) FROM tb_post p WHERE p.post_subject_id = s.subject_id AND post_user_id='$user_id') ";
        $sql .= " WHERE ";
        $sql .= " subject_id IN( ";
        $sql .= " SELECT post_subject_id FROM tb_post ";
        $sql .= " WHERE post_user_id='$user_id') ";
        
        Log::debug($sql);
        $this->db->query ($sql);
        
        //delete tb_post
        $sql  = " DELETE FROM tb_post";
        $sql .= " WHERE post_user_id='".$user_id."'";
        
        Log::debug($sql);
        $this->db->query ($sql);
        
        $this->db->query("COMMIT");
        $this->db->query("END");

        $this->close_connect();
    
        return true;
    }   
}

?>