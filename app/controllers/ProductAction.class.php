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
    
    public function product_list()
    {
        $item_id = $this->get_param_value("item_id");
        $current_page = $this->get_param_value("current_page");
    
    
        $product_list =  $this->product_dao->get_product_list_by_item_id($item_id, ProductDAO::$ALL_FLAG, $this->product_view->page, $current_page);
        $this->product_view->set_product_list($product_list);
    
 
        $this->product_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->product_view->display_product_list();
    }
    
    public function product_save_ui()
    {
        $item_id = $this->get_param_value("item_id");
        
        $product_view = new ProductView();
        $product_view->item_id = $item_id;
        
        $product_view->display_product_save_ui();
    }
    
    public function product_save()
    {
        $product_view = new ProductView();
        $product_dao  = new ProductDAO();
        
        $product_view->product_name = $_POST["product_name"];
        $product_view->description  = $_POST["description"];
        $product_view->promulgator  = $_POST["promulgator"];
        $product_view->status       = $_POST["status"];
        $product_view->flag         = $_POST["flag"];
        $product_view->item_id      = $_POST["item_id"];
        
        if($_FILES["file"]["name"] != null)
        {
            $path = "/public/data/".MerchantDAO::get_merchant_id()."/product/".$product_view->item_id."/";
            
            $filename = md5( microtime(true) . rand(1000, 9999) );
            $filename .= ($_FILES["file"]["type"] == "image/gif") ? ".gif" : ".jpg";
            
            $product_view->icon_url = $path.$filename;
            $product_view->pic_url  = $path.$filename;       
            
            $path =Util::get_deploy_path().$path;
            
            Util::upload_image($path, $filename);
        }
        
        $product_dao->save_product($product_view);
        
        $this->set_param_value("item_id", $product_view->item_id);
        $this->set_param_value("current_page", "1");
        
        $this->product_list();    
    }
    
    public function product_delete()
    {
        $product_id = $this->get_param_value("product_id");
    
        $product_dao  = new ProductDAO();
    
        $product_view = $product_dao->get_product_by_id($product_id);
    
        $product_dao->delete_product($product_view);
        
        $this->product_list();
    }
    
}

?>