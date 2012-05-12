<?php

    class Util 
    {
        public static function get_client_ip_address()
        {
            return $_SERVER["REMOTE_ADDR"];
        }
        
        public static function get_deploy_path()
        {
            $deploy_path = dirname(dirname(dirname(__FILE__)));
            
            Log::debug($deploy_path);
            
            return $deploy_path;
        }
        
        public static function get_document_path()
        {
            $project_name = Config::get_pjname();
            
            $doc_path = $_SERVER['DOCUMENT_ROOT']."/".$project_name;
            
            return $doc_path;
        }
        
	    public static function get_base_url()
	    {
	    	$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';
	    	
	    	$port = $_SERVER["SERVER_PORT"]==80 ? '':':'.$_SERVER["SERVER_PORT"];
	    	
	    	$project_name = Config::get_pjname();
	    	
	    	$base_url = $http.$_SERVER['SERVER_NAME'].$port."/".$project_name;
	    	
	    	//$url = $http.$_SERVER['SERVER_NAME'].$port.$_SERVER["REQUEST_URI"];
	    	
	    	return $base_url;
	    }
	    
	    public static function is_mobile()
	    {
	    	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	    
	    	$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
	    
	    	$is_mobile = false;
	    
	    	foreach ($mobile_agents as $device)
	    	{
	    		if (stristr($user_agent, $device))
	    		{
	    			$is_mobile = true;
	    			break;
	    		}
	    	}
	    
	    	return $is_mobile;
	    }
    }

?>