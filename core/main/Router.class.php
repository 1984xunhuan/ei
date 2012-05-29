<?php

    class Router
    {
    	private $route;
    	private $controller;
    	private $action;
    	private $params;
    	
    	private $default_controller;
    	private $default_action;
    	
    	public function __construct()
    	{
    		$this->default_controller = Config::get_pjcontroller();
    		$this->default_action     = Config::get_pjaction();
    		
    		$path = array_keys($_GET);
    		
    		foreach ($path as $p)
    		{
    			Log::debug("path=".$p);
    		}
    		 		
    		if(!isset($path[0]))
    		{
    			if(!empty($this->default_controller))
    			{
    				$path[0] = $this->default_controller;
    			}
    			else
    			{
    				$path[0] = "IndexAction";
    			}
    		}
    		
    		$route = $path[0];
    		$this->route = $route;
    		$routeParts = split("/", $route);
    		$this->controller = $routeParts[0];

    		if(empty($this->default_action))
    		{
    		    $this->default_action = "main";
    		}

    		$this->action = isset($routeParts[1]) ? $routeParts[1]:$this->default_action;
    		array_shift($routeParts);
    		array_shift($routeParts);
    		$this->params = $routeParts;
    		
    		Log::debug("route=".$this->route);
    		Log::debug("controller=".$this->controller);
    		Log::debug("action=".$this->action);
    		
    		foreach ($this->params as $param)
    		{
    		   Log::debug( "params=".$param);
    		}
    	}
    	
    	public function getAction()
    	{
    		return $this->action;
    	}
    	
    	public function getController()
    	{
    		return $this->controller;
    	}
    	
    	public function getParams()
    	{
    		return $this->params;
    	}
    }
?>