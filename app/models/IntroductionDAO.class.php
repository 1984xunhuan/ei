<?php

class IntroductionDAO extends BaseDAO
{
    /**
    create table tb_introduction 
    (
     introduction_id integer not null auto_increment,
     introduction_content text, 
     item_id integer not null, 
     primary key (introduction_id))
     */
    
    public function get_introduction_by_id($introduction_id)
    {
        $this->open_connect();
        
        $sql  = " SELECT introduction_id, introduction_content, item_id FROM tb_introduction ";
        $sql .= " WHERE introduction_id='".$introduction_id."' limit 1";
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("introduction_id=$introduction_id not found, please check check database");
            
            $this->free_result($result);
            $this->close_connect();
        
            return null;
        }
        
        $introduction_view = new IntroductionView();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $introduction_view->introduction_id      = $rs['introduction_id'];
            $introduction_view->introduction_content = $rs['introduction_content'];
            $introduction_view->item_id              = $rs['item_id'];
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $introduction_view;
    }
    
    public function get_introduction_by_item_id($item_id)
    {
        $this->open_connect();
        
        $sql  = " SELECT introduction_id, introduction_content, item_id FROM tb_introduction ";
        $sql .= " WHERE item_id='".$item_id."' limit 1";
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error(__FILE__.":".__LINE__."   item_id=$item_id not found, please check check database");
            
            
            //$this->free_result($result);
            
            $this->close_connect();
            
            return null;
        }
        
        $introduction_view = new IntroductionView();

        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $introduction_view->introduction_id      = $rs['introduction_id'];
            $introduction_view->introduction_content = $rs['introduction_content'];
            $introduction_view->item_id              = $rs['item_id'];
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $introduction_view;
    }
    
    public function save_introduction($introduction_view)
    {
        $this->open_connect();
        
        $sql  = " INSERT INTO `tb_introduction`(`introduction_content`,`item_id`)";
        $sql .= " VALUES (";
        $sql .= "'".$introduction_view->introduction_content."',";
        $sql .= "'".$introduction_view->item_id."')";
        
        Log::debug ($sql);
        
        $this->db->query ($sql);
        
        $this->close_connect();
        
        return true;
    }
    
    public function update_introduction($introduction_view)
    {
        $this->open_connect();
    
        $sql  = " UPDATE `tb_introduction` SET ";
        $sql .= " introduction_content =";
        $sql .= "'".$introduction_view->introduction_content."'";
        $sql .= " WHERE introduction_id='".$introduction_view->introduction_id."'";
    
        Log::debug ($sql);
    
        $this->db->query ($sql);
    
        $this->close_connect();
    
        return true;
    }
    
}

?>