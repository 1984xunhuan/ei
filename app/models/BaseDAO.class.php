<?php

class BaseDAO {
	protected static $db_dburl;
	protected static $db_dbname;
	protected static $db_username;
	protected static $db_password;
	protected static $db_charset;
	
	protected $db;
	
	function __construct() 
	{
		$this->get_db_info();
		//$this->init_db();
	}
	
	function __destruct() 
	{
	    //log::out_print("close connect....");
	   
	    //$this->db->close();
	}
	
	public function get_db_info()
	{
		self::$db_dburl    = Config::get_dburl();
		self::$db_dbname   = Config::get_dbname();
		self::$db_username = Config::get_dbusername();
		self::$db_password = Config::get_dbpassword();
		self::$db_charset  = Config::get_dbcharset();
	}

	public function open_connect()
	{
	    $this->db = new DB();
		$this->db->connect(self::$db_dburl, self::$db_username, self::$db_password, self::$db_dbname, self::$db_charset);
	    
		Log::debug("open connect....");
	}
	
	public function free_result($result)
	{
	    return $this->db->free_result($result);
	}
	
	public function close_connect()
	{
	    $this->db->close();
	}
}

?>