<?php

class Page
{    
    public $total_page; // 鎬婚〉鏁�
    public $page_size;  // 椤甸潰澶у皬
    public $current_page; //褰撳墠椤�
    public $row_num; //琛屾暟
    public $start_row;//寮�濮嬭
    public $data_list;   //缁撴灉闆�
    public $query_param; //鏌ヨ鏉′欢
    
    function __construct() {
	
        $this->total_page   = 0;
        $this->current_page = 0;
        $this->page_size    = 5;
        $this->row_num      = 0;
        $this->start_row    = 0;
        $this->data_list    = NULL;
        $this->query_param  = NULL;
	}
	
	function __destruct() {
	
	}
	
	public function set_row_num($row_num)
	{
	    $this->row_num = $row_num;
	}
	
	public function set_current_page($current_page)
	{
	    $this->current_page = $current_page;
	}
	
	public function cal()
	{
	    
	    $this->total_page = $this->row_num % $this->page_size == 0 ? (int)($this->row_num / $this->page_size) : (int)($this->row_num / $this->page_size) + 1;
	    
	    if ($this->current_page < 1) {
	        $this->current_page = 1;
	    }
	    
	    if ($this->current_page > $this->total_page) {
	        $this->current_page = $this->total_page;
	    }
	    
	    $this->start_row = ($this->current_page - 1) * $this->page_size;
	}
     
}

?>