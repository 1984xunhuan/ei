<?php

class Page
{    
    public $total_page; // 总页敄1�7
    public $page_size;  // 页面大小
    public $current_page; //当前顄1�7
    public $row_num; //行数
    public $start_row;//弄1�7始行
    public $data_list;   //结果雄1�7
    public $query_param; //查询条件
    
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