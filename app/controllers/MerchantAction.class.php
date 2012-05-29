<?php

class MerchantAction extends BaseAction
{
    public function merchant_save_ui()
    {
        $merchant_id = $this->get_param_value("merchant_id");
        
        $merchant_view = new MerchantView();
        $merchant_dao  = new MerchantDAO();
        
        if($merchant_id != null && !empty($merchant_id))
        {            
            $merchant_view->merchant = $merchant_dao->get_merchant_by_id($merchant_id);
        }
        
        $merchant_view->display_merchant_save_ui();     
    }
    
    public function merchant_save()
    {
        $merchant_view = new MerchantView();
        $merchant_dao  = new MerchantDAO();
        
        $merchant_view->merchant_id   = $_POST["merchant_id"];
        $merchant_view->merchant_name = $_POST["merchant_name"];
        $merchant_view->key_word      = $_POST["key_word"];
        $merchant_view->wap_domain    = $_POST["wap_domain"];
        $merchant_view->web_domain    = $_POST["web_domain"];
        $merchant_view->wap_template  = $_POST["wap_template"];
        $merchant_view->web_template  = $_POST["web_template"];
        $merchant_view->email         = $_POST["email"];
        $merchant_view->linkman       = $_POST["linkman"];
        $merchant_view->address       = $_POST["address"];
        $merchant_view->telephone     = $_POST["telephone"];
        $merchant_view->fax           = $_POST["fax"];
        $merchant_view->click_times   = "0";
        $merchant_view->reg_time      = "NOW()";
        $merchant_view->merchant_seq  = $_POST["merchant_seq"];
        

        if($merchant_view->merchant_id != null && !empty($merchant_view->merchant_id))
        {
            $merchant_view->merchant = $merchant_dao->get_merchant_by_id($merchant_view->merchant_id);
            
            if($merchant_view->merchant == null)
            {
                $merchant_dao->save_merchant($merchant_view);   
            }
            else
            {
                $merchant_dao->update_merchant($merchant_view);
            }
            
            $this->set_param_value("merchant_id", $merchant_view->merchant_id);
        }              
        
        $this->merchant_save_ui();
    }
}

?>