<?php

class ItemAction extends BaseAction
{
    public function item_layout()
    {
        $type = $this->get_param_value("type");
        
        $item_view = new ItemView();
        
        if($type == "WEB")
        {
            $item_view->left_url  = Util::get_base_url()."/index.php?ItemAction/web_item_list";
            $item_view->right_url = "#";
        }
        else if($type == "WAP")
        {    
            $item_view->left_url = Util::get_base_url()."/index.php?ItemAction/wap_item_list";
            $item_view->right_url = "#";
        }
    
        $item_view->display_item_layout();
    }
    
    public function web_sub_item()
    {
        $item_id    = $this->get_param_value("item_id");
        $item_up_id = $this->get_param_value("item_up_id");
        
        $item_view    = new ItemView();
        $item_dao     = new ItemDAO();
        $merchant_dao = new MerchantDAO();
        
        $item_view->menus     = $item_dao->get_item_by_up_id($item_up_id); 
        $item_view->sub_menus = $item_dao->get_item_by_up_id($item_id);
        $item_view->item      = $item_dao->get_item_by_id($item_id);
        $item_view->merchant  = $merchant_dao->get_merchant();
        
        $item_view->display_web_sub_item();
    }
    
    public function web_item_list()
    {
        $item_view = new ItemView();
        
        $item_dao = new ItemDAO();
        
        $item_view->menus = $item_dao->get_admin_menu('1');
        
        $item_view->display_web_item_list();
    }
    
    public function wap_item_list()
    {
        $item_view = new ItemView();
    
        $item_dao = new ItemDAO();
    
        $item_view->menus = $item_dao->get_admin_menu('2');
    
        $item_view->display_web_item_list();
    }
    
    public function item_info()
    {
        $item_id      = $this->get_param_value("item_id");
        
        $item_view = new ItemView();
        
        $item_dao = new ItemDAO();
        
        $item_view->item = $item_dao->get_item_by_id($item_id);
        
        $item_view->display_item_info();
    }
    
    public function item_add_ui()
    {
        $item_id      = $this->get_param_value("item_id");
    
        $item_view = new ItemView();
        
        $item_view->item_up_id = $item_id;
    
        $item_view->display_item_add_ui();
    }
    
    public function item_add()
    {
        $item_view = new ItemView();
        
        $item_dao = new ItemDAO();
        
        $item_view->item_name = $_POST["item_name"];
        $item_view->item_up_id = $_POST["item_up_id"];
        $item_view->item_seq = $_POST["item_seq"];
        $item_view->item_content = $_POST["item_content"];
        $item_view->item_type = $_POST["item_type"];
        
        $item = $item_dao->get_item_by_id($item_view->item_up_id);
        
        Log::out_print("item->item_level=".$item->item_level);
        
        $item_view->item_level = $item->item_level + 1;
        $item_view->item_site  = $item->item_site;
        
        Log::out_print("item_view->item_level=".$item_view->item_level);
        
        $item_dao->set_item_view($item_view);
        
        $item_dao->save_item();
    }
    
    public function item_update_ui()
    {
        $item_id      = $this->get_param_value("item_id");
    
        $item_view = new ItemView();
        $item_dao  = new ItemDAO();
    
        $item_view->item = $item_dao->get_item_by_id($item_id);
    
        $item_view->display_item_update_ui();
    }
    
    public function item_update()
    {
        $item_dao = new ItemDAO();
    
        $item_id = $_POST["item_id"];
        
        Log::out_print($item_id);
        
        $item_view = $item_dao->get_item_by_id($item_id);
        
        print_r($item_view);
        
        $item_view->item_name = $_POST["item_name"];
        $item_view->item_seq = $_POST["item_seq"];
        $item_view->item_content = $_POST["item_content"];
    
        $item_dao->set_item_view($item_view);
    
        $item_dao->update_item();
    }
    
    public function item_delete()
    {
        $item_id      = $this->get_param_value("item_id");
    
        $item_dao = new ItemDAO();
        
        $merchant_id = MerchantDAO::get_merchant_id();
    
        $item_dao->delete_item($item_id, $merchant_id);
    }
}

?>