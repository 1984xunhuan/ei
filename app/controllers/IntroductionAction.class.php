<?php

class IntroductionAction extends BaseAction
{
    private $introduction_dao;
    private $item_dao;
    private $merchant_dao;
    
    private $introduction_view;
    
    public function __construct()
    {
        $this->introduction_dao  = new IntroductionDAO();
        $this->item_dao          = new ItemDAO();
        $this->merchant_dao      = new MerchantDAO();
    
        $this->introduction_view = new IntroductionView();
    }

    public function web_introduction_show()
    {
        $item_id         = $this->get_param_value("item_id");
        //$introduction_id = $this->get_param_value("introduction_id");
        
        log::debug("web_introduction_show function: item_id=".$item_id);
        
        $this->introduction_view->introduction =  $this->introduction_dao->get_introduction_by_item_id($item_id);
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->introduction_view->set_menus($menus);
        
        $this->introduction_view->item = $this->item_dao->get_item_by_id($item_id);
        
        $this->introduction_view->merchant = $this->merchant_dao->get_merchant();
        
        $this->introduction_view->display_web_introduction_show();
    }
    
    public function wap_introduction_show()
    {
        $item_id         = $this->get_param_value("item_id");
        //$introduction_id = $this->get_param_value("introduction_id");
    
        log::debug("web_introduction_show function: item_id=".$item_id);
    
        $this->introduction_view->introduction =  $this->introduction_dao->get_introduction_by_item_id($item_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->introduction_view->set_menus($menus);
    
        $this->introduction_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->introduction_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->introduction_view->display_wap_introduction_show();
    }
}

?>