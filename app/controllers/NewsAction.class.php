<?php

class NewsAction extends BaseAction
{
    private $news_dao;
    private $item_dao;
    private $merchant_dao;
    
    private $news_view;
    
    public function __construct()
    {
        $this->news_dao     = new NewsDAO();
        $this->item_dao     = new ItemDAO();
        $this->merchant_dao = new MerchantDAO();
        
        $this->news_view    = new NewsView();
    }
    
    public function web_news_list()
    {
        $item_id      = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
        
        Log::debug("web_news_list function: item_id=".$item_id);
        
        $news_list =  $this->news_dao->get_news_list_by_item_id($item_id, NewsDAO::$ALL_FLAG, $this->news_view->page, $current_page);       
        $this->news_view->set_news_list($news_list);   
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->news_view->set_menus($menus);
        
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
        
        $this->news_view->merchant = $this->merchant_dao->get_merchant();  
              
        $this->news_view->display_web_news_list();
    }
    
    public function wap_news_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
    
        Log::debug("web_news_list function: item_id=".$item_id);
    
        $news_list =  $this->news_dao->get_news_list_by_item_id($item_id, NewsDAO::$ALL_FLAG, $this->news_view->page, $current_page); 
        $this->news_view->set_news_list($news_list);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->news_view->set_menus($menus);
    
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->news_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->news_view->display_wap_news_list();
    }
    
    public function web_news_show()
    {
        $item_id = $this->get_param_value("item_id");
        $news_id = $this->get_param_value("news_id");
    
        Log::debug("web_news_list function: news_id=".$news_id);
    
        $this->news_view->news =  $this->news_dao->get_news_by_id($news_id);
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->news_view->set_menus($menus);
    
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
        
        $this->news_view->merchant = $this->merchant_dao->get_merchant();  
    
        $this->news_view->display_web_news_show();
    }
    
    public function wap_news_show()
    {
        $item_id = $this->get_param_value("item_id");
        $news_id = $this->get_param_value("news_id");
    
        Log::debug("web_news_list function: news_id=".$news_id);
    
        $this->news_view->news =  $this->news_dao->get_news_by_id($news_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->news_view->set_menus($menus);
    
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->news_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->news_view->display_wap_news_show();
    }
    
    
    public function news_list()
    {
        $item_id      = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
    
    
        $news_list =  $this->news_dao->get_news_list_by_item_id($item_id, NewsDAO::$ALL_FLAG, $this->news_view->page, $current_page);
        $this->news_view->set_news_list($news_list);
    
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->news_view->display_news_list();
    }
    
    public function news_show()
    {
        $item_id = $this->get_param_value("item_id");
        $news_id = $this->get_param_value("news_id");
    
        $this->news_view->news =  $this->news_dao->get_news_by_id($news_id);
    
        $this->news_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->news_view->display_news_show();
    }
    
    public function news_save_ui()
    {
        $item_id = $this->get_param_value("item_id");
        
        $news_view = new NewsView();
        $news_view->item_id = $item_id;
        
        $news_view->display_news_save_ui();
    }
    
    public function news_save()
    {
        $news_view = new NewsView();
        $news_dao  = new NewsDAO();
        
        $news_view->title       = $_POST["title"];
        $news_view->content     = $_POST["content"];
        $news_view->promulgator = $_POST["promulgator"];
        $news_view->status      = $_POST["status"];
        $news_view->flag        = $_POST["flag"];
        $news_view->item_id     = $_POST["item_id"];
                
        $path = "/public/data/".MerchantDAO::get_merchant_id()."/news/".$news_view->item_id."/";
        
        $filename = md5( microtime(true) . rand(1000, 9999) );
	    $filename .= ($_FILES["file"]["type"] == "image/gif") ? ".gif" : ".jpg";
        
        $news_view->pic_url = $path.$filename;
        
        $path =Util::get_deploy_path().$path;
        
        Util::upload_image($path, $filename);
        
        $news_dao->save_news($news_view);
    }
}

?>