<?php

    class Dispatcher
    {
    	public static function dispatch($router)
    	{
    		global $app;
    		
    		ob_start();
    		
    		$start = microtime(true);
    				
    		$controller = $router->getController();
    		$action = $router->getAction();
    		$params = $router->getParams();
    		
    		$controllerfile = "app/controllers/{$controller}.class.php";
    		
    		Log::debug("controllerfile=".$controllerfile.", action=".$action);
    		
    		if(file_exists($controllerfile))
    		{
    			if(Config::get_pjcontroller() == "UserAction" && Config::get_pjaction() == "login_system")
    			{
    			    $amdin_user = $_SESSION['ADMIN_USER'];
    			    
    			    if($amdin_user == null || empty($amdin_user))
    			    {
    			        $controller = Config::get_pjcontroller();
    			        $action     = Config::get_pjaction();
    			    }
    			}
    			
    			require_once($controllerfile);
    			
    			$app = new $controller();
    			$app->setParams($params);			
    			$app->$action();
    			
    			if(isset($start))
    			{
    				Log::debug("Total time for dispatching is: ".(microtime(true)-$start)."seconds.");
    				$output = ob_get_clean();
    				echo $output;
    			}
    			else
    			{
    				throw new Exception("Controller not found.");
    			}
    		}
    		
    	}
    }
?>