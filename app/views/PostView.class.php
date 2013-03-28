<?php

class PostView extends BaseView
{

    public $post_id;
    public $post_subject_id;
    public $post_user_id;
    public $post_content;
    public $post_issue_time;
    public $post_flag;
    
    //extern
    public $user_name;
    
    //relationship is 1:N
    public $subject_view;
    public $post_list;
    //
    public $page;
    
    public  $merchant;
    public  $item;
    
    private $menus;
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    public function display_web_post_list()
    {
        //Log::out_print("USER_ID: ".$_SESSION["USER_ID"]);
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('subject_view', $this->subject_view);
        $tpl->assign('post_list', $this->post_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
        
        $tpl->display("web_post_list.html");
    }
    
    public function display_web_post_publish_ui()
    {
        $tpl = new Template ();
        
        $tpl_id = $this->get_web_template_id();    
    
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('subject_id', $this->post_subject_id);
        $tpl->assign('item', $this->item);
        $tpl->assign('template_id', $tpl_id);
        
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/post/");
        
        $tpl->display("web_post_publish.html");
    } 
    
    public function display_post_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('subject_view', $this->subject_view);
        $tpl->assign('post_list', $this->post_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
  
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("post_list.html");
    }
}

?>