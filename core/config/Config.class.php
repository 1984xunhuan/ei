<?php

    class Config
    {
        //project
        private static $pj_name;
        private static $pj_tmp_dir;
        
        //database
    	private static $db_dburl;
    	private static $db_dbname;
    	private static $db_username;
    	private static $db_password;
    	private static $db_charset;
    	
    	//log
    	private static $log_path;
    	private static $log_size;
    	private static $log_level;
    	
    	function __construct()
    	{
    		
    	}

    	public static function init_config()
    	{
    	    self::get_configure_info();
    	}
    	
    	public static function get_configure_info()
    	{
    	    $cfg = parse_ini_file("config.ini", true);
    	
    	    //project
    	    self::$pj_name    = $cfg['project']['pj_name'];
    	    self::$pj_tmp_dir = $cfg['project']['pj_tmp_dir'];
    	    
    	    //database
    	    self::$db_dburl    = $cfg['database']['db_url'];
    	    self::$db_dbname   = $cfg['database']['db_name'];
    	    self::$db_username = $cfg['database']['db_username'];
    	    self::$db_password = $cfg['database']['db_password'];
    	    self::$db_charset  = $cfg['database']['db_charset'];
    	
    	    //log
    	    self::$log_path  = $cfg['log']['log_path'];
    	    self::$log_size  = $cfg['log']['log_size'];
    	    self::$log_level = $cfg['log']['log_level'];   	     
    	}
    	
    	public static function print_config_info()
    	{
    	   Log::out_print("db_url=".self::get_dburl()."<br/>");
    	   Log::out_print("db_name=".self::get_dbname()."<br/>");
    	   Log::out_print("db_username=".self::get_dbusername()."<br/>");
    	   Log::out_print("db_password=".self::get_dbpassword()."<br/>");
    	   Log::out_print("db_charset=".self::get_dbcharset()."<br/>");
    	    
    	   Log::out_print("log_path=".self::get_logpath()."<br/>");
    	   Log::out_print("log_size=".self::get_logsize()."<br/>");
    	   Log::out_print("log_level=".self::get_loglevel()."<br/>");
    	}
    	
    	public static function log_config_info()
    	{
    	   Log::debug("db_url=".self::get_dburl()."<br/>");
    	   Log::debug("db_name=".self::get_dbname()."<br/>");
    	   Log::debug("db_username=".self::get_dbusername()."<br/>");
    	   Log::debug("db_password=".self::get_dbpassword()."<br/>");
    	   Log::debug("db_charset=".self::get_dbcharset()."<br/>");
    	
    	   Log::debug("log_path=".self::get_logpath()."<br/>");
    	   Log::debug("log_size=".self::get_logsize()."<br/>");
    	   Log::debug("log_level=".self::get_loglevel()."<br/>");
    	}
    	
    	public static function get_pjname()
    	{
    	    return self::$pj_name;
    	}
    	
    	public static function get_pjtmpdir()
    	{
    	    return self::$pj_tmp_dir;
    	}
    	
    	public static function get_dburl()
    	{	
    	    return self::$db_dburl;
    	}
    	
    	public static function get_dbname()
    	{
    		return self::$db_dbname;
    	}
    	
    	public function get_dbusername()
    	{
    		return self::$db_username;
    	}
    	
    	public static function get_dbpassword()
    	{
    		return self::$db_password;
    	}
    	
    	public static function get_dbcharset()
    	{
    	    return self::$db_charset;
    	}
    	
    	public static function get_logpath()
    	{
    	    return self::$log_path;
    	}
    	
    	public static function get_logsize()
    	{
    	    return self::$log_size;
    	}
    	
    	public static function get_loglevel()
    	{
    	    return self::$log_level;
    	}
    }
?>