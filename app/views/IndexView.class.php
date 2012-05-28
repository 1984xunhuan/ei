<?php

class IndexView extends BaseView
{
    public $item;
    public $introduction;
    public $news_list;
    public $product_list;
    public $subject_list;
    public $merchant;
    
    private $results;
    public $menus;
    public $pic_news_list;
    
    public function __construct()
    {
        $this->item         = new ItemView();
        $this->news_list    = array();
        $this->product_list = array();
    }
    
    public function set_results($results)
    {
        $this->results = $results;
    }
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    public function display_web_index()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('pic_news_list', $this->pic_news_list);
        $tpl->assign('results', $this->results);
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
    
    
        $tpl->display("web_index.html");
    }
    
    public function display_wap_index()
    {
        $tpl = new Template();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('results', $this->results);
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
    
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("wap_index.html");
    }
    
    public function display_admin_index()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("admin_layout.html");
    }
}

?>