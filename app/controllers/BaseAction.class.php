<?php

class BaseAction
{
    protected $params;
    
    protected function get_param_value($param_name)
    {
        $count = count($this->params);
        
        Log::debug("get_param_value function: count= ".$count);
        
        if($count%2 != 0)
        {
            Log::error("there are params error, please check your input params.");
            
            return null;
        }
        
        for($i = 0; $i < $count; $i+=2)
        {
            if($param_name == $this->params[$i])
            {
                return $this->params[$i+1];
            }     
        }
        
        return null;
    }
    
    public function setParams($params)
    {
        $this->params = $params;
    }
}

?>