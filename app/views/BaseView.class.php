<?php

class BaseView
{

    protected  function get_web_template_id()
    {
        return "default";
    }
    
    protected  function get_wap_template_id()
    {
        return "default";
    }
    
    protected  function get_web_find_path()
    {
        $tpl_id = $this->get_web_template_id();
        
        $findPath = Util::get_deploy_path()."/public/web/template/".$tpl_id."/layout/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/contact_us/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/introduction/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/news/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/post/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/product/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/subject/"."$";
        $findPath.= Util::get_deploy_path()."/public/web/template/".$tpl_id."/user/";
        
        return $findPath;
    }
    
    protected  function get_wap_find_path()
    {
        $tpl_id = $this->get_wap_template_id();
    
        $findPath = Util::get_deploy_path()."/public/wap/template/".$tpl_id."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/layout/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/contact_us/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/introduction/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/news/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/post/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/product/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/subject/"."$";
        $findPath.= Util::get_deploy_path()."/public/wap/template/".$tpl_id."/user/";
    
        return $findPath;
    }
}

?>