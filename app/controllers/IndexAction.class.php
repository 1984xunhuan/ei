<?php

class IndexAction extends BaseAction
{

    public function main()
    {
        //Log::out_print("System test ****************");
        
        $index_view = new IndexView();
        
        $index_view->display_web_index();
    }
}

?>