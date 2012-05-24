<?php

class IntroductionView extends BaseView
{
    
    public $introduction_id;
    public $introduction_content;
    public $item_id;
    
    public $introduction;
    public $merchant;
    public $menus;
    public $item;
    
    public function __construct()
    {
       
    }
    
    public function set_merchant($merchant)
    {
        $this->merchant = $merchant;
    }
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    public function display_web_introduction_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('introduction', $this->introduction);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
        
        
        $tpl->display("web_introduction_show.html");
    }
    
    public function display_wap_introduction_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('introduction', $this->introduction);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();        
        $tpl->setFindPath($findPath);
        
    
        $tpl->display("wap_introduction_show.html");
    }
    
    public function display_introduction_list()
    {
         $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item',$this->item);
        $tpl->assign('introduction', $this->introduction);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("introduction_list.html");
    }
    
    
    
}

?>