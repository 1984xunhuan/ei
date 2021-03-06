<?php

class ProductView extends BaseView
{   
    public $product_id;
    public $product_name;
    public $description;
    public $promulgator;
    public $issue_time;
    public $click_times;
    public $status;
    public $flag;
    public $icon_url;
    public $pic_url;
    public $item_id;
    
    
    public  $product_list;
    public  $merchant;
    private $menus;
    public  $product;
    public  $item;
    public  $page;
    
    public function __construct()
    {
        $this->page = new Page();
    }
    
    public function set_product_list($product_list)
    {
        $this->product_list = $product_list;
    }
    
    public function set_merchant($merchant)
    {
        $this->merchant = $merchant;
    }
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    public function set_page_size($page_size)
    {
        $this->page->page_size = $page_size;
    }
    
    public function display_web_product_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('product_list', $this->product_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus',     $this->menus);
        $tpl->assign('merchant',  $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
          
        $tpl->display("web_product_list.html");
    }
    
    public function display_wap_product_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('product_list', $this->product_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus',     $this->menus);
        $tpl->assign('merchant',  $this->merchant);
        
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();        
        $tpl->setFindPath($findPath);
           
        $tpl->display("wap_product_list.html");
    }
    
    public function display_web_product_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('product', $this->product);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
         
        $tpl->display("web_product_show.html");
    }
    
    public function display_wap_product_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('product', $this->product);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
           
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();        
        $tpl->setFindPath($findPath);
    
        $tpl->display("wap_product_show.html");
    }
    
    public function display_product_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('product_list', $this->product_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("product_list.html");
    }
    
    public function display_product_save_ui()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());

        $tpl->assign('item_id', $this->item_id);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("product_add.html");
    }
    
    
    public function display_product_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('item', $this->item);
        $tpl->assign('product', $this->product);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
    
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("product_show.html");
    }
    
}

?>