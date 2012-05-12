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
        
        $sql = "SELECT introduction_id, introduction_content, item_id FROM tb_introduction ";
        $sql .= "WHERE introduction_id='".$introduction_id."' limit 1";
        
        log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if(empty($result))
        {
            log::error("introduction_id=$introduction_id not found, please check check database");
        
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
        
        $sql = "SELECT introduction_id, introduction_content, item_id FROM tb_introduction ";
        $sql .= " WHERE item_id='".$item_id."' limit 1";
        
        log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if(empty($result))
        {
            log::error("item_id=$item_id not found, please check check database");
        
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
    
}

?>