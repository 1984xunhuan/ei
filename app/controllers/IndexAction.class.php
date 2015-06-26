<?php

class IndexAction extends BaseAction
{
    private $item_dao;
    private $news_dao;
    private $merchant_dao;
    
    private $index_view;
    
    public function __construct()
    {
        $this->item_dao     = new ItemDAO();
        $this->news_dao     = new NewsDAO();
        $this->merchant_dao = new MerchantDAO();
        $this->index_view   = new IndexView();
    }
    public function display_web()
    {
        Log::debug("enter web index page.");
        
        $results = $this->item_dao->get_web_index_info();
        $this->index_view->set_results($results);
        
        $this->index_view->menus         = $this->item_dao->get_web_index_menu();
        $this->index_view->merchant      = $this->merchant_dao->get_merchant();
        $this->index_view->pic_news_list = $this->news_dao->get_web_index_pic_news_list();
        
        $this->index_view->display_web_index();
    }
    
    public function display_wap()
    {
        Log::debug("enter wap index page.");
        
        $results = $this->item_dao->get_wap_index_info();
        $this->index_view->set_results($results);
        
        $this->index_view->menus = $this->item_dao->get_wap_index_menu();
        $this->index_view->merchant = $this->merchant_dao->get_merchant();
        
        $this->index_view->display_wap_index();
    }

    public function main()
    {
        Log::debug("Invoke main function of IndexAction class.");
        
        if (Util::is_mobile ())
        {
            $this->display_wap();
        }
        else
        { 
            $this->display_web();
        }
    }   
    
    public function admin()
    {
        $menus = $this->item_dao->get_admin_menu('1');
        $this->index_view->set_menus($menus);
        $this->index_view->display_admin_index();
    }
    
    public function android_main()
    {
    	  $results = $this->item_dao->get_wap_index_info();
        $this->index_view->set_results($results);
        
        $this->index_view->menus = $this->item_dao->get_wap_index_menu();
        $this->index_view->merchant = $this->merchant_dao->get_merchant();
        
        //var_dump(json_encode($results)); 
        //var_dump(json_encode($this->index_view)); 
        //var_dump(json_encode($this->index_view->menus)); 
        //var_dump(json_encode($this->index_view->merchant)); 
        
        echo json_encode($this->index_view->menus);
    }
}
?>
