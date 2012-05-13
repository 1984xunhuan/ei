<?php

class ProductAction extends BaseAction
{
    private $product_dao;
    private $item_dao;
    private $merchant_dao;
    
    private $product_view;
    
    public function __construct()
    {
        $this->product_dao  = new ProductDAO();
        $this->item_dao     = new ItemDAO();
        $this->merchant_dao = new MerchantDAO();
        
        $this->product_view = new ProductView();
    }
    
    public function web_product_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
        
        Log::debug("web_product_list function: item_id=".$item_id);
        
        $product_list =  $this->product_dao->get_product_list_by_item_id($item_id, ProductDAO::$ALL_FLAG, $this->product_view->page, $current_page);       
        $this->product_view->set_product_list($product_list);   
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->product_view->set_menus($menus);
        
        $this->product_view->item = $this->item_dao->get_item_by_id($item_id);
        
        $this->product_view->merchant = $this->merchant_dao->get_merchant();  
              
        $this->product_view->display_web_product_list();
    }
    
    public function wap_product_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
    
        Log::debug("wap_product_list function: item_id=".$item_id);
    
        $product_list =  $this->product_dao->get_product_list_by_item_id($item_id, ProductDAO::$ALL_FLAG, $this->product_view->page, $current_page);
        $this->product_view->set_product_list($product_list);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->product_view->set_menus($menus);
    
        $this->product_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->product_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->product_view->display_wap_product_list();
    }
    
    public function web_product_show()
    {
        $item_id = $this->get_param_value("item_id");
        $product_id = $this->get_param_value("product_id");
    
        Log::debug("web_product_list function: product_id=".$product_id);
    
        $this->product_view->product =  $this->product_dao->get_product_by_id($product_id);
        
        $menus = $this->item_dao->get_web_index_menu();
        $this->product_view->set_menus($menus);
    
        $this->product_view->item = $this->item_dao->get_item_by_id($item_id);
        
        $this->product_view->merchant = $this->merchant_dao->get_merchant();  
    
        $this->product_view->display_web_product_show();
    }
    
    public function wap_product_show()
    {
        $item_id = $this->get_param_value("item_id");
        $product_id = $this->get_param_value("product_id");
    
        Log::debug("web_product_list function: product_id=".$product_id);
    
        $this->product_view->product =  $this->product_dao->get_product_by_id($product_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->product_view->set_menus($menus);
    
        $this->product_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->product_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->product_view->display_wap_product_show();
    }
    
}

?>