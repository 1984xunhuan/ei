<?php

class ContactUsView extends BaseView
{
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
    
    public function display_web_contact_us_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
                
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath); 
    
        $tpl->display("web_contact_us_show.html");
    }
    
    public function display_wap_contact_us_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->merchant->wap_template;
        
        if(empty($tpl_id))
        {
            $tpl_id = "default";
            
            $this->merchant->wap_template = $tpl_id;
        }
        
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(util::get_document_path()."/public/wap/template/".$tpl_id."/");
        
    
        $tpl->display("wap_contact_us_show.html");
    }
}

?>