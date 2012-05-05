<?php

class IndexView extends BaseView
{

    public function display_web_index()
    {
        $tpl = new Template ();
    
        $tpl->set('base_url', Util::get_base_url());
    
        $tpl->assign('pic_news_list', $this->pic_news_list);
        $tpl->assign('results', $this->results);
        $tpl->assign('menus',   $this->menus);
        $tpl->assign('merchant',$this->merchant);
    
        $tpl_id = $this->merchant->web_template;
    
        if(empty($tpl_id))
        {
            $tpl_id = "default";
    
            $this->merchant->web_template = $tpl_id;
        }
    
        $tpl->setTemplateId($tpl_id);
        $tpl->setFindPath(Util::get_deploy_path()."/public/web/template/".$tpl_id."/");
    
    
        $tpl->display("web_index.html");
    }
}

?>