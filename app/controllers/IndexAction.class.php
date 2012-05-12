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

    public function main()
    {
        if (util::is_mobile ())
        {
            $results = $this->item_dao->get_wap_index_info();            
            $this->index_view->set_results($results);
            
            $this->index_view->menus = $this->item_dao->get_wap_index_menu();
            $this->index_view->merchant = $this->merchant_dao->get_merchant();

            $this->index_view->display_wap_index();
        }
        else
        { 
            $results = $this->item_dao->get_web_index_info();            
            $this->index_view->set_results($results);
            
            //$this->index_view->menus = $this->item_dao->get_web_index_menu();
            $this->index_view->merchant = $this->merchant_dao->get_merchant();
            
            $menus = $this->item_dao->get_web_index_menu();
            $this->index_view->set_menus($menus);
     
            $this->index_view->pic_news_list = $this->news_dao->get_web_index_pic_news_list();
            
            $this->index_view->display_web_index();
        }
    }
}
?>
