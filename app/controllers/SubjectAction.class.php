<?php

class SubjectAction extends BaseAction
{
    
    public function display_web_subject_publish_ui()
    {
        $item_id = $this->get_param_value("item_id");
        
        $subject_view = new SubjectView();
        
        $subject_view->subject_item_id = $item_id;
        
        $subject_view->display_web_subject_publish_ui();
    }

    public function web_subject_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
        
        $subject_dao = new SubjectDAO();
        $subject_view = new SubjectView();
        
        $item_dao     = new ItemDAO();
        $merchant_dao = new MerchantDAO();
        
        $subject_view->subject_list =  $subject_dao->get_subject_list_by_item_id($item_id, SubjectDAO::$ALL_FLAG, $subject_view->page, $current_page);
        
        $menus = $item_dao->get_web_index_menu();
        $subject_view->set_menus($menus);
        
        $subject_view->item = $item_dao->get_item_by_id($item_id);
        
        $subject_view->merchant = $merchant_dao->get_merchant();
        
        $subject_view->display_web_subject_list();
    }
    
    public function web_subject_publish()
    {
        $subject_dao = new SubjectDAO();
        $subject_view = new SubjectView();
        
        $subject_view->subject_topic      = $_POST["subject_topic"];
        $subject_view->subject_user_id    = $_SESSION["USER_ID"];
        $subject_view->subject_reply_num  = "0";
        $subject_view->subject_content    = $_POST["subject_content"];
        $subject_view->subject_issue_time = "NOW()";
        $subject_view->subject_type       = "0";
        $subject_view->subject_item_id    = $_POST["subject_item_id"];
        $subject_view->subject_flag       = "0";
        
        $subject_dao->set_subect_view($subject_view);
        $subject_dao->publish_subject();
        
        $url = Util::get_base_url()."/index.php?SubjectAction/web_subject_list/current_page/1/item_id/".$_POST["subject_item_id"];
        
        Header("Location: $url");
    }
    
    
    public function subject_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
    
        $subject_dao = new SubjectDAO();
        $subject_view = new SubjectView();
    
        $item_dao     = new ItemDAO();
    
        $subject_view->subject_list =  $subject_dao->get_subject_list_by_item_id($item_id, SubjectDAO::$ALL_FLAG, $subject_view->page, $current_page);
    
        $subject_view->item = $item_dao->get_item_by_id($item_id);
    
        $subject_view->display_subject_list();
    }
    
    public function subject_delete()
    {
        $subject_id = $this->get_param_value("subject_id");
    
        $subject_dao = new SubjectDAO();
    
        $subject_view = $subject_dao->get_subject_by_id($subject_id);
    
        $subject_dao->delete_subject($subject_view);
        
        $this->subject_list();
    }
    
}

?>