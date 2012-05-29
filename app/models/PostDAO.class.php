<?php

class PostDAO extends BaseDAO
{

    /**
     CREATE TABLE tb_post
     (
      post_id int not null auto_increment,
      post_subject_id int not null,
      post_user_id varchar(20) not null,
      post_content text,
      post_issue_time datetime,
      post_flag varchar(20),
      PRIMARY KEY(post_id)
     );
     */
    
    private $post_view;
    
    public function set_post_view($post_view)
    {
        $this->post_view = $post_view;
    }
    
    
    public function publish_post()
    {
        $sql  = " INSERT INTO ";
        $sql .= " tb_post (post_subject_id, post_user_id, post_content, post_issue_time, post_flag) ";
        $sql .= " VALUES (";
        $sql .= "'".$this->post_view->post_subject_id."', ";
        $sql .= "'".$this->post_view->post_user_id."', ";
        $sql .= "'".$this->post_view->post_content."', ";
        $sql .= "".$this->post_view->post_issue_time.", ";
        $sql .= "'".$this->post_view->post_flag."' ";
        $sql .= ")";
        
        Log::debug($sql);
        
        $this->open_connect();
        
        $this->db->query("BEGIN");
        
        $this->db->query($sql);
        
        $sql = "UPDATE tb_subject SET subject_reply_num=subject_reply_num+1 WHERE subject_id='".$this->post_view->post_subject_id."'";
        
        $this->db->query($sql);
        
        $this->db->query("COMMIT");
        
        $this->close_connect();
    }
    
    public function post_list(&$page=NULL,$current_page=1)
    {
        $this->open_connect();
        
        $sql  = " SELECT COUNT(0) FROM tb_post p, tb_user u ";
        $sql .= " WHERE u.user_id=p.post_user_id AND post_flag = '0' ";
        $sql .= " AND post_subject_id='".$this->post_view->post_subject_id."'";
        $sql .= " ORDER BY post_issue_time DESC ";
    
        Log::debug($sql);
    
        $result  = $this->db->query($sql);
    
        $row_num = $this->db->result($result);
    
        $this->free_result($result);
    
        if($page == NULL)
        {
            $page = new Page();
        }
    
        $page->set_current_page($current_page);
        $page->set_row_num($row_num);
        $page->cal();
    
        $sql  = " SELECT post_id, post_subject_id, post_user_id, u.user_name, post_content, post_issue_time, post_flag FROM tb_post p, tb_user u ";
        $sql .= " WHERE u.user_id=p.post_user_id AND post_flag = '0' ";
        $sql .= " AND post_subject_id='".$this->post_view->post_subject_id."'";
        $sql .= " ORDER BY post_issue_time DESC ";
        $sql .= " limit ".$page->start_row.", ".$page->page_size;
    
        Log::debug($sql);
    
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("Data is not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
    
        $post_list = array();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $post_view = new PostView();
    
            $post_view->post_id         = $rs['post_id'];
            $post_view->post_subject_id = $rs['post_subject_id'];
            $post_view->post_user_id    = $rs['post_user_id'];
            $post_view->user_name       = $rs['user_name'];
            $post_view->post_content    = $rs['post_content'];
            $post_view->post_issue_time = $rs['post_issue_time'];
            $post_view->post_flag       = $rs['post_flag'];
            
            array_push($post_list, $post_view);
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $post_list;
    }
    
    public function get_post_by_id($post_id)
    {
        $this->open_connect();
    
        $sql  = " SELECT post_id, post_subject_id, post_user_id, u.user_name, post_content, post_issue_time, post_flag FROM tb_post s, tb_user u ";
        $sql .= " WHERE u.user_id=s.post_user_id ";
        $sql .= " AND s.post_id='".$post_id."'";
    
        Log::debug($sql);
    
        $result = $this->db->query($sql);
    
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("Data is not found, please check check database");
    
            $this->close_connect();
    
            return null;
        }
    
        $post_view = new postView();
    
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $post_view->post_id         = $rs['post_id'];
            $post_view->post_subject_id = $rs['post_subject_id'];
            $post_view->post_user_id    = $rs['post_user_id'];
            $post_view->user_name       = $rs['user_name'];
            $post_view->post_content    = $rs['post_content'];
            $post_view->post_issue_time = $rs['post_issue_time'];
            $post_view->post_flag       = $rs['post_flag'];
        }
    
        $this->free_result($result);
        $this->close_connect();
    
        return $post_view;
    }
    
    public function delete_post($post_view)
    {
        $this->open_connect();
        
        $this->db->query("BEGIN");
    
        $sql = "DELETE FROM tb_post where post_id='".$post_view->post_id."'";
        Log::debug ($sql);
        $this->db->query ($sql);
        
        $sql = "UPDATE tb_subject SET subject_reply_num=subject_reply_num-1 WHERE subject_id='".$post_view->post_subject_id."'";
        Log::debug ($sql);
        $this->db->query($sql);
        
        $this->db->query("COMMIT");
        $this->db->query("END");
 
        $this->close_connect();
    
        return true;
    }
    
    
  
}

?>