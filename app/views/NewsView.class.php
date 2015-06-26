<?php

class NewsView extends BaseView
{
    public $news_id;
    public $title;
    public $content;
    public $promulgator;
    public $issue_time;
    public $click_times;
    public $status;
    public $flag;
    public $pic_url;
    public $item_id;
    
    
    public $news_list;
    public  $merchant;
    private $menus;
    public  $news;
    public  $item;
    public  $page;
    
    public function __construct()
    {
        $this->page = new Page();
    }
    
    public function set_news_list($news_list)
    {
        $this->news_list = $news_list;
    }
    
    public function set_merchant($merchant)
    {
        $this->merchant = $merchant;
    }
    
    public function set_menus($menus)
    {
        $this->menus = $menus;
    }
    
    public function display_web_news_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('news_list', $this->news_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus',     $this->menus);
        $tpl->assign('merchant',  $this->merchant);
        
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
          
        $tpl->display("web_news_list.html");
    }
    
    public function display_wap_news_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('news_list', $this->news_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus',     $this->menus);
        $tpl->assign('merchant',  $this->merchant);
        
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("wap_news_list.html");
    }
    
    public function display_web_news_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('news', $this->news);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
          
        $tpl_id = $this->get_web_template_id();
        $this->merchant->web_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_web_find_path();        
        $tpl->setFindPath($findPath);
        
    
        $tpl->display("web_news_show.html");
    }
    
    public function display_wap_news_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('news', $this->news);
        $tpl->assign('item', $this->item);
        $tpl->assign('menus', $this->menus);
        $tpl->assign('merchant', $this->merchant);
        
              
        $tpl_id = $this->get_wap_template_id();
        $this->merchant->wap_template = $tpl_id;
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_wap_find_path();        
        $tpl->setFindPath($findPath);
    
        $tpl->display("wap_news_show.html");
    }
    
    public function display_news_list()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('news_list', $this->news_list);
        $tpl->assign('page', $this->page);
        $tpl->assign('item', $this->item);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("news_list.html");
    }
    
    public function display_news_show()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('news', $this->news);
        $tpl->assign('item', $this->item);
    
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
    
        $tpl->display("news_show.html");
    }
    
    public function display_news_save_ui()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('item_id', $this->item_id);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("news_add.html");
    }
}

?>