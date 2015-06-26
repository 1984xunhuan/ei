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
        
        Log::debug("web_introduction_show function: item_id=".$item_id);
        
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
    
        Log::debug("web_introduction_show function: item_id=".$item_id);
    
        $this->introduction_view->introduction =  $this->introduction_dao->get_introduction_by_item_id($item_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->introduction_view->set_menus($menus);
    
        $this->introduction_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->introduction_view->merchant = $this->merchant_dao->get_merchant();
    
        $this->introduction_view->display_wap_introduction_show();
    }
    
     public function android_introduction_show()
    {
        $item_id         = $this->get_param_value("item_id");
        //$introduction_id = $this->get_param_value("introduction_id");
    
        Log::debug("web_introduction_show function: item_id=".$item_id);
    
        $this->introduction_view->introduction =  $this->introduction_dao->get_introduction_by_item_id($item_id);
    
        $menus = $this->item_dao->get_wap_index_menu();
        $this->introduction_view->set_menus($menus);
    
        $this->introduction_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->introduction_view->merchant = $this->merchant_dao->get_merchant();
        
        //echo json_encode($this->introduction_view->merchant);
        echo json_encode($this->introduction_view->introduction);
    }
    
    public function introduction_list()
    {
        $item_id         = $this->get_param_value("item_id");
    
        $this->introduction_view->introduction =  $this->introduction_dao->get_introduction_by_item_id($item_id);
    
        $this->introduction_view->item = $this->item_dao->get_item_by_id($item_id);
    
        $this->introduction_view->display_introduction_list();
    }
    
    public function introduction_save_ui()
    {
        $item_id = $this->get_param_value("item_id");
        
        $introductionView = new IntroductionView();
        $introductionView->item_id = $item_id;
        
        $introduction_dao  = new IntroductionDAO();
        
        $introductionView->introduction = $introduction_dao->get_introduction_by_item_id($item_id);
        
        $introductionView->display_introduction_save_ui();
    }
    
    public function introduction_save()
    {
        $introduction_view = new IntroductionView();
        $introduction_dao  = new IntroductionDAO();
        
        $introduction_view->introduction_id      = $_POST["introduction_id"];
        $introduction_view->introduction_content = $_POST["introduction_content"];
        $introduction_view->item_id              = $_POST["item_id"];
        
        if($introduction_view->introduction_id  == null || empty($introduction_view->introduction_id ))
        {
            $introduction_dao->save_introduction($introduction_view);
        }
        else
        {
            $introduction_dao->update_introduction($introduction_view);
        }
        
        $this->set_param_value("item_id", $introduction_view->item_id);
        
        $this->introduction_list();
    }

}

?>