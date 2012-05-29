<?php

class MerchantView extends BaseView
{   
    public $merchant_id;
    public $merchant_name;
    public $key_word;
    public $wap_domain;
    public $web_domain;
    public $wap_template;
    public $web_template;
    public $email;
    public $linkman;
    public $address;
    public $telephone;
    public $fax;
    public $click_times;
    public $reg_time;
    public $merchant_seq;
    
    //
    public $merchant;
    
    public function display_merchant_save_ui()
    {
        $tpl = new Template ();
        
        $tpl->set('base_url', Util::get_base_url());
        
        $tpl->assign('merchant', $this->merchant);
        
        $tpl_id = $this->get_admin_template_id();
        $tpl->setTemplateId($tpl_id);
        
        $findPath = $this->get_admin_find_path();
        $tpl->setFindPath($findPath);
        
        $tpl->display("merchant_info.html");
    }
}

?>