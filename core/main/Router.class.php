<?php

    class Router
    {
    	private $route;
    	private $controller;
    	private $action;
    	private $params;
    	
    	public function __construct()
    	{
    		$default_controller = "IndexAction";
    		
    		$path = array_keys($_GET);
    		
    		foreach ($path as $p)
    		{
    			Log::debug("path=".$p);
    		}
    		 		
    		if(!isset($path[0]))
    		{
    			if(!empty($default_controller))
    			{
    				$path[0] = $default_controller;
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
    		$this->action = isset($routeParts[1]) ? $routeParts[1]:main;
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
    		if(empty($this->action))
    		{
    			$this->action = "main";
    		}
    		
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