<?php

class SubjectView extends BaseView
{

    //subject entity
    public $subject_id;
    public $subject_topic;
    public $subject_user_id;
    public $subject_reply_num;
    public $subject_content;
    public $subject_issue_time;
    public $subject_type;
    public $subject_flag;
    public $subject_item_id;
    
    //extern 
    public $user_name;
    
    //
    public $subject_list;
    public $page;
    
    public  $merchant;
    public  $item;
    
    private $menus;
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    
    public function display_web_subject_publish_ui()
    {
        //Log::out_print("USER_ID: ".$_SESSION["USER_ID"]);
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('item_id', $this->subject_item_id);
        
        $tpl_id = $this->get_web_template_id();
        
        $tpl->assign('template_id', $tpl_id);
        
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/subject/");
        
        $tpl->display("web_subject_publish.html");
    }
    
    public function display_web_subject_list()
    {
        //Log::out_print("USER_ID: ".$_SESSION["USER_ID"]);
    
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('subject_list', $this->subject_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
    
        $tpl->display("web_subject_list.html");
    }
}

?>