<?php

class ContactUsAction extends BaseAction
{
    private $item_dao;
    private $merchant_dao;
    
    private $contact_us_view;
    
    public function __construct()
    {
        $this->item_dao        = new ItemDAO();
        $this->merchant_dao    = new MerchantDAO();
    
        $this->contact_us_view = new ContactUsView();
    }
    
    public function web_contact_us_show()
    {
        $item_id         = $this->get_param_value("item_id");
        //$introduction_id = $this->get_param_value("introduction_id");
    
        log::debug("web_contact_us_show function: item_id=".$item_id);
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->contact_us_view->set_menus($menus);
    
        $this->contact_us_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->contact_us_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->contact_us_view->display_web_contact_us_show();
    }
    
    public function wap_contact_us_show()
    {
        $item_id         = $this->get_param_value("item_id");
        //$introduction_id = $this->get_param_value("introduction_id");
    
        log::debug("web_contact_us_show function: item_id=".$item_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->contact_us_view->set_menus($menus);
    
        $this->contact_us_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->contact_us_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->contact_us_view->display_wap_contact_us_show();
    }
}

?>