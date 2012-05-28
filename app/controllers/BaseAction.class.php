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
    
    protected function set_param_value($param_name, $param_value)
    {
        $count = count($this->params);
    
        Log::debug("get_param_value function: count= ".$count);
    
        if($count%2 != 0)
        {
            Log::error("there are params error, please check your input params.");
    
            return null;
        }
        
        array_push($this->params, $param_name);
        array_push($this->params, $param_value);
        
        return true;
    }
    
    protected function display_params()
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
            Log::out_print($this->params[$i].",".$this->params[$i+1]);
        }
    }
    
    protected function admin_verify() 
    {
        
    }
    
    public function setParams($params)
    {
        $this->params = $params;
    }
}

?>