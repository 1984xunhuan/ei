<?php

class MerchantDAO extends BaseDAO
{
    /***
     DROP TABLE IF EXISTS `tb_merchant`;
     
     CREATE TABLE tb_merchant 
     (
     merchant_id varchar(16) not null, 
     merchant_name varchar(200), 
     key_word varchar(200), 
     wap_domain varchar(100), 
     web_domain varchar(100), 
     wap_template varchar(20),
     web_template varchar(20),
     email varchar(100), 
     linkman varchar(100), 
     address varchar(100), 
     telephone varchar(20), 
     fax varchar(20), 
     click_times int, 
     reg_time datetime, 
     merchant_seq int, 
     primary key (merchant_id)
     )
     * */
    
    public static function get_merchant_id()
    {
        $merchant_id = 'M0001';
        
        return $merchant_id;
    }
    
    public function get_merchant()
    {
        $merchant_id = 'M0001';
        return $this->get_merchant_by_id($merchant_id);
    }
    
    public function get_merchant_by_id($merchant_id)
    {   
        $this->open_connect();
        
        $sql  = " SELECT merchant_id, merchant_name, key_word, wap_domain, web_domain, wap_template, web_template, email, linkman, address, telephone, fax, click_times, reg_time,  merchant_seq FROM tb_merchant ";
        $sql .= " WHERE merchant_id='".$merchant_id."' limit 1";
        
        Log::debug($sql);
        
        $result = $this->db->query ($sql);
        
        if($result ==  null || empty($result) || $this->db->num_rows($result) == 0)
        {
            Log::error("merchant_id=$merchant_id not found, please check check database");
        
            $this->close_connect();
        
            return null;
        }
        
        $merchant_view = new MerchantView();
        
        while(($rs = $this->db->fetch_array($result)) != NULL)
        {
            $merchant_view->merchant_id   = $rs['merchant_id'];
            $merchant_view->merchant_name = $rs['merchant_name'];
            $merchant_view->key_word      = $rs['key_word'];
            $merchant_view->wap_domain    = $rs['wap_domain'];
            $merchant_view->web_domain    = $rs['web_domain'];
            $merchant_view->wap_template  = $rs['wap_template'];
            $merchant_view->web_template  = $rs['web_template'];
            $merchant_view->email         = $rs['email'];
            $merchant_view->linkman       = $rs['linkman'];
            $merchant_view->address       = $rs['address'];
            $merchant_view->telephone     = $rs['telephone'];
            $merchant_view->fax           = $rs['fax'];
            $merchant_view->click_times   = $rs['click_times'];
            $merchant_view->reg_time      = $rs['reg_time'];
            $merchant_view->merchant_seq  = $rs['merchant_seq'];
        }
        
        $this->free_result($result);
        $this->close_connect();
        
        return $merchant_view;
    }
    
    public function save_merchant($merchant_view)
    {
        $sql  = " INSERT INTO ";
        $sql .= " `tb_merchant`(`merchant_id`,`merchant_name`,`key_word`,`wap_domain`,`web_domain`,`wap_template`,`web_template`,`email`,`linkman`,`address`,`telephone`,`fax`,`click_times`,`reg_time`,`merchant_seq`) ";
        $sql .= " VALUES (";
        $sql .= "'".$merchant_view->merchant_id."', ";
        $sql .= "'".$merchant_view->merchant_name."', ";
        $sql .= "'".$merchant_view->key_word."', ";
        $sql .= "'".$merchant_view->wap_domain."', ";
        $sql .= "'".$merchant_view->web_domain."', ";
        $sql .= "'".$merchant_view->wap_template."', ";
        $sql .= "'".$merchant_view->web_template."', ";
        $sql .= "'".$merchant_view->email."', ";
        $sql .= "'".$merchant_view->linkman."', ";
        $sql .= "'".$merchant_view->address."', ";
        $sql .= "'".$merchant_view->telephone."', ";
        $sql .= "'".$merchant_view->fax."', ";
        $sql .= "'".$merchant_view->click_times."', ";
        $sql .= "".$merchant_view->reg_time.", ";
        $sql .= "'".$merchant_view->merchant_seq."' ";
        $sql .= ")";
    
        Log::debug($sql);
        Log::out_print($sql);
    
        $this->open_connect();
   
        $this->db->query($sql);
    
        $this->close_connect();
        
        return true;
    }
    
    public function update_merchant($merchant_view)
    {
        $sql  = " UPDATE ";
        $sql .= " `tb_merchant` ";
        $sql .= " SET ";
        $sql .= " merchant_name='".$merchant_view->merchant_name."', ";
        $sql .= " key_word='".$merchant_view->key_word."', ";
        $sql .= " wap_domain='".$merchant_view->wap_domain."', ";
        $sql .= " web_domain='".$merchant_view->web_domain."', ";
        $sql .= " wap_template='".$merchant_view->wap_template."', ";
        $sql .= " web_template='".$merchant_view->web_template."', ";
        $sql .= " email='".$merchant_view->email."', ";
        $sql .= " linkman='".$merchant_view->linkman."', ";
        $sql .= " address='".$merchant_view->address."', ";
        $sql .= " telephone='".$merchant_view->telephone."', ";
        $sql .= " fax='".$merchant_view->fax."', ";
        $sql .= " merchant_seq='".$merchant_view->merchant_seq."' ";
        $sql .= " WHERE ";
        $sql .= " merchant_id='".$merchant_view->merchant_id."'";
    
        Log::debug($sql);
        Log::out_print($sql);
    
        $this->open_connect();
    
        $this->db->query($sql);
    
        $this->close_connect();
    
        return true;
    }
    

}

?>