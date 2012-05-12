<?php

class PostAction extends BaseAction
{

    public function web_post_list()
    {
        $current_page = $this->get_param_value("current_page");
        $subject_id   = $this->get_param_value("subject_id");
        $item_id      = $this->get_param_value("item_id");
        
        $post_dao  = new PostDAO();
        $post_view = new PostView();
        
        $subject_dao = new SubjectDAO();
        
        $item_dao     = new ItemDAO();
        $merchant_dao = new MerchantDAO();
        
        
        $post_view->subject_view = $subject_dao->get_subject_by_id($subject_id);
        
        $post_view->post_subject_id = $subject_id;
        
        $post_dao->set_post_view($post_view);
        $post_view->post_list = $post_dao->post_list($post_view->page, $current_page);
        
        $menus = $item_dao->get_web_index_menu();
        $post_view->set_menus($menus);
        
        $post_view->item = $item_dao->get_item_by_id($item_id);
        
        $post_view->merchant = $merchant_dao->get_merchant();
        
        
        $post_view->display_web_post_list();
    }
    
    public function display_web_post_publish_ui()
    {
        $subject_id   = $this->get_param_value("subject_id");
        $item_id = $this->get_param_value("item_id");
        
        $post_view = new PostView();
        
        $item_dao     = new ItemDAO();
        $merchant_dao = new MerchantDAO();
        
        $post_view->post_subject_id = $subject_id;
        
        $menus = $item_dao->get_web_index_menu();
        $post_view->set_menus($menus);
        
        $post_view->item = $item_dao->get_item_by_id($item_id);
        
        $post_view->merchant = $merchant_dao->get_merchant();
        
        $post_view->display_web_post_publish_ui();
    }
    
    public function web_post_publish()
    {
        $post_dao = new postDAO();
        $post_view = new postView();
    
        $post_view->post_content    = $_POST["post_content"];
        $post_view->post_user_id    = $_SESSION["USER_ID"];
        $post_view->post_issue_time = "NOW()";
        $post_view->post_subject_id = $_POST["post_subject_id"];
        $post_view->post_flag       = "0";
    
        $post_dao->set_post_view($post_view);
        $post_dao->publish_post();
        
        
        $url = Util::get_base_url()."/index.php?PostAction/web_post_list/current_page/1/subject_id/".$_POST["post_subject_id"]."/item_id/".$_POST["item_id"];
        
        Header("Location: $url");
        
        /*
        $action = new PostAction();
        
        
        $action->params="current_page/1/subject_id/".$_POST["post_subject_id"]."/item_id/".$_POST["item_id"];
        
        $_GET["current_page"] = 1;
        $_GET["subject_id"]   = $_POST["post_subject_id"];
        $_GET["item_id"]      = $_POST["item_id"];
        $action->web_post_list();
        */
        
    }
}

?>