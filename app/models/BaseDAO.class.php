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
	    //Log::debug(__FILE__.":".__LINE__."    close connect....");
	    Log::debug("close connect....");
	    
	    $this->db->close();
	}
	
	/**
	 CREATE TABLE tb_table_pk
	 (
	 table_name varchar(20) not null,
	 pk_value varchar(20),
	 PRIMARY KEY (table_name)
	 );
	 */
	
	public function get_pk_value($table_name)
	{
	    $sql  = " SELECT pk_value FROM tb_table_pk ";
	    $sql .= " WHERE table_name = '".$table_name."'";
	    
	    Log::debug($sql);
	    
	    $this->open_connect();
	    
	    $this->db->query("LOCK TABLES tb_table_pk");
	    
	    $result = $this->db->query($sql);
	    
	    $rows = $this->db->num_rows($result);
	    
	    $value = 0;
	    
	    if($rows == 0)
	    {
	        $sql  = " INSERT INTO ";
	        $sql .= " tb_table_pk (table_name, pk_value) ";
	        $sql .= " VALUES(";
	        $sql .= " '".$table_name."', '0'";
	        $sql .= " )";
	        
	        Log::debug($sql);
	        
	        $this->db->query($sql);
	    }
	    else 
	    {
	        $value = $this->db->result($result);
	    }
	    
	    $this->db->free_result($result);
	    
	    $value  = (intval($value, 10)+1);
	    
	    //Log::out_print($value);
	    
	    $sql  = " UPDATE ";
	    $sql .= " tb_table_pk ";
	    $sql .= " SET ";
	    $sql .= " pk_value='".$value."'";
	    $sql .= " WHERE ";
	    $sql .= " table_name='".$table_name."'";
	    
	    Log::debug($sql);
	    
	   
	    $this->db->query($sql);
	    
	    $this->db->query("UNLOCK TABLES");
	    
	    $this->close_connect();
	    
	    return sprintf("%012d",$value);
	}
}

?>