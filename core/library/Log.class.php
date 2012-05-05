<?php
require_once 'core/config/Config.class.php';
class Log {
	
	function __construct() {
	
	}
	
	function __destruct() {
	
	}
	
	public static function out_print($msg)
	{
	   self::write_log($msg, 'print');
	}
	
	public static function info($msg)
	{
		self::write_log($msg, 'info');
	}
	
	public static function debug($msg)
	{
		self::write_log($msg, 'debug');
	}
	
	public static function error($msg)
	{
		self::write_log($msg, 'error');
	}
	
	public static function write_log($s_message, $s_type)
	{ 
	    if($s_type == 'print')
	    {
	        $s_now_time = date('Y-m-d H:i:s');
	        $s_message = "\r\n[LOG $s_now_time] ".$s_message;
	        
	        echo $s_message;
	        
	        return ;    
	    }
	    
	    Config::get_configure_info();
	    
	    $log_level = Config::get_loglevel();
	    
	    if(self::get_log_level($log_level) > self::get_log_level($s_type))
	    {
	        return ;
	    }
	    
	    if (!file_exists(Config::get_logpath()))
	    {
	        mkdir(Config::get_logpath());
	    }
	    
	    chmod(Config::get_logpath(), 0777);
	    
	    if(!is_writable(Config::get_logpath()))
	    {
	        exit('log path is not writeable.');
	    }
	    
	    $s_now_time = date('Y-m-d H:i:s');
	    $s_now_day  = date('Y_m_d');
	    
	    $s_target = Config::get_logpath();
	    $s_target = $s_target.DIRECTORY_SEPARATOR.$s_now_day.'.log';
	    
	    switch($s_type)
	    {
	        case 'info':
	            $s_message = "\r\n[INFO $s_now_time] ".$s_message;
	            break;
	        case 'debug':
	            $s_message = "\r\n[DEBUG $s_now_time] ".$s_message;
	            break;
	        case 'error':
	            $s_message = "\r\n[ERROR $s_now_time] ".$s_message;
	            break;
	        default:
	            $s_message = "\r\n[INFO $s_now_time] ".$s_message;
	            break;
	    }
	    
	    if(file_exists($s_target) && Config::get_logsize() <= filesize($s_target))
	    {
	        $s_file_name = substr(basename($s_target), 0, strrpos(basename($s_target), '.log')).'_'.time().'.log';
	        
	        rename($s_target, dirname($s_target).DIRECTORY_SEPARATOR.$s_file_name);
	    }
	    
	    clearstatcache();
	    
	    error_log("$s_message", 3, $s_target);   
	}
	
	public static function get_log_level($s_log_level)
	{
	    switch($s_log_level)
	    {
	        case 'info':
	            return 1;
	        case 'debug':
	            return 2;
	        case 'error':
	            return 3;
	    }
	    
	    return 0;
	}
}

?>