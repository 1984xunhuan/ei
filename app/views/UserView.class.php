<?php

class UserView extends BaseView
{

    public $user_id;
    public $user_name;
    public $user_password;
    public $user_reg_time;
    public $user_level;
    public $user_status;
    public $user_reg_ip;
    public $user_login_ip;
    public $user_last_active_time;
    public $user_last_login_time;
    public $user_type;
    
    //
    public $user_list;
    public $page;
    
    public function display_login_success()
    {
        Log::out_print("USER_ID: ".$_SESSION["USER_ID"]);
        
        $msg = "Login success";
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());       
        $tpl->assign('msg', $msg);
        
        $tpl_id = $this->get_web_template_id();
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");   
        
        $tpl->display("web_user_msg.html");
    }
    
    public function display_login_fail()
    {
        $msg = "Login failure";
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('msg', $msg);
        
        $tpl_id = $this->get_web_template_id();
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");
        
        $tpl->display("web_user_msg.html");
    }
    
    public function display_web_register_success()
    {   
        $msg = "Register success";
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('msg', $msg);
        
        $tpl_id = $this->get_web_template_id();
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");
        
        $tpl->display("web_user_msg.html");
    }
    
    public function display_web_register_fail()
    {
        $msg = "Register failure";
        
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('msg', $msg);
        
        $tpl_id = $this->get_web_template_id();
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");
        
        $tpl->display("web_user_msg.html");
    }
    
    public function display_web_login_ui()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('pic_news_list', $this->pic_news_list);
        
        $tpl_id = $this->get_web_template_id();
        
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");
        
        
        $tpl->display("web_user_login.html");
    }
    
    public function display_web_register_ui()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl_id = $this->get_web_template_id();
        
        $tpl->assign('template_id', $tpl_id);
    
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_deploy_path()."/public/web/template/".$tpl_id."/user/");
    
    
        $tpl->display("web_user_register.html");
    }
    
    public function display_user_list()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        $tpl->assign('user_list', $this->user_list);
        $tpl->assign('page', $this->page);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("user_list.html");
    }
    
    public function display_login_ui()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
    
        $tpl->display("user_login.html");
    }
    
}

?>
