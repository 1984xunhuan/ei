<?php

class UserAction extends BaseAction
{
    
    public function display_login_ui()
    {
        $user_view = new UserView();
        
        $user_view->display_login_ui();
    }
    
    public function display_web_register_ui()
    {
        $user_view = new UserView();
    
        $user_view->display_web_register_ui();
    }
    
    public function web_logout()
    {
        //session_start();
        unset($_SESSION['USER_ID']);
        
        $action = new IndexAction();
        
        $action->main();
    }
    
    public function web_login_system()
    {
        $user_dao = new UserDAO();
        
        $user_view = new UserView();
        
        $user_view->user_name = $_POST["user_name"];
        $user_view->user_password = $_POST["user_password"];
        $user_view->user_login_ip = Util::get_client_ip_address();
        $user_view->user_last_login_time = "NOW()";
        
        $user_dao->set_user_view($user_view);
        
        if($user_dao->login())
        {
            //$user_view->display_login_success();
            $action = new IndexAction();
            
            $action->main();
        }
        else
        {
            $user_view->display_login_fail();
        }
    }
    
    public function register_user_info()
    {
        $user_dao = new UserDAO();
        $user_view = new UserView();
        
        $user_name = $_POST["user_name"];
        
        if($user_dao->had_registered($user_name))
        {
            $user_view->display_web_register_fail();
            
            return;
        }
        
        $user_view->user_id = $user_dao->get_pk_value("tb_user");
        $user_view->user_last_active_time = "NOW()";
        $user_view->user_last_login_time  = "NOW()";
        $user_view->user_level = "1";
        $user_view->user_login_ip = Util::get_client_ip_address();
        $user_view->user_name = $_POST["user_name"];;
        $user_view->user_password = $_POST["user_password"];;
        $user_view->user_reg_ip = Util::get_client_ip_address();
        $user_view->user_reg_time = "NOW()";
        $user_view->user_status = "0";
        
        
        $user_dao->set_user_view($user_view);
        
        $user_dao->register_user_info();
        
        $user_view->display_web_register_success();
    }
}

?>