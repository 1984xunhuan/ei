<?php

class UserDAO extends BaseDAO
{

    /**
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
      PRIMARY KEY  (user_id)
      );  
     */
    
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
        $sql .= " tb_user (user_id, user_name, user_password, user_reg_time, user_level, user_status, user_reg_ip, user_login_ip, user_last_active_time, user_last_login_time) ";
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
        $sql .= "".$this->user_view->user_last_login_time." ";
        $sql .= ")";
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $this->db->query($sql);
       
        $this->close_connect();
    }
    
    public function login()
    {
        $sql  = " SELECT user_id FROM tb_user ";
        $sql .= " WHERE ";
        $sql .= " user_name='".$this->user_view->user_name."'";
        $sql .= " AND ";
        $sql .= " user_password='".$this->user_view->user_password."'";
        
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
        
        $_SESSION["USER_ID"] = $user_id;
        $_SESSION["USER_NAME"] = $this->user_view->user_name;
        
        return true;
    }
}

?>