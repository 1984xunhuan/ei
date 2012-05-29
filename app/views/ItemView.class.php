<?php

class ItemView extends BaseView
{

    public $item_id;
    public $item_name;
    public $item_seq;
    public $item_level;
    public $item_up_id;
    public $item_content;
    public $item_reg_time;
    public $item_status;
    public $item_type;
    public $item_site;
    
    
    public $menus;
    public $item;
    public $merchant;
    public $sub_menus;
    
    public $left_url;
    public $right_url;
    
    public function display_item_layout()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('left_url', $this->left_url);
        $tpl->assign('right_url',$this->right_url);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("item_layout.html");
    }
    
    public function display_web_sub_item()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('sub_menus', $this->sub_menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("web_item_list.html");
    }
    
    public function display_web_item_list()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("item_list.html");
    }
    
    public function display_wap_item_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("item_list.html");
    }
    
    public function display_item_info()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('item',$this->item);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("item_info.html");
    }
    
    
    public function display_item_add_ui()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item_up_id',$this->item_up_id);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("item_add.html");
    }
    
    public function display_item_update_ui()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item', $this->item);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("item_update.html");
    }
    
}

?>