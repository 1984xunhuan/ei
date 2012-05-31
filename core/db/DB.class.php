<?php


class DB
{
  private $querynum = 0 ; 
  private $dblink   = null;       
  
  function __construct()
  {
  	
  }
  
  //connect database
  function connect($dbhost,$dbuser,$dbpw,$dbname='',$dbcharset='utf-8',$pconnect=0 , $halt=true)
  {
     $func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect' ;
     $this->dblink = @$func($dbhost,$dbuser,$dbpw) ;
     
     if ($halt && !$this->dblink)
     {
        $this->halt("system halt.");
     }
     
     //
     mysql_query("SET character_set_connection={$dbcharset},character_set_results={$dbcharset},character_set_client=binary",$this->dblink) ;
     
     //
     $dbname && @mysql_select_db($dbname,$this->dblink) ;
  }
  
  //
  function select_db($dbname)
  {
     return mysql_select_db($dbname,$this->dblink);
  }
  
  //
  function query($sql)
  {
      //Log::out_print($sql."<br/>");
      
      $this->querynum++ ;
      return mysql_query($sql,$this->dblink) ;
  }
  
  //
  function affected_rows()
  {
     return mysql_affected_rows($this->dblink) ;
  }
  
  //
  function num_rows($result)
  {
     return mysql_num_rows($result) ;
  }
  
  //
  function result($result,$row=0)
  {
     return mysql_result($result,$row) ;
  }
  
  //
  function insert_id()
  {
     return ($id = mysql_insert_id($this->dblink)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
  }
  
  //
  function fetch_row($result)
  {
     return mysql_fetch_row($result) ;
  }
  
  //
  function fetch_assoc($result)
  {
     return mysql_fetch_assoc($result);
  }
  
  //
  function fetch_array($result)
  {
     return mysql_fetch_array($result);
  }
  
  function free_result($result)
  {
     return mysql_free_result($result);
  }
  
  function is_close()
  {
     return true;
  }
  
  //
  function close()
  {
      if(mysql_stat($this->dblink) != null)
      {
          return mysql_close($this->dblink);
      }
      
      return true;
  }
  
  //
  function halt($msg)
  {
     $message = "<html>\n<head>\n" ;
     $message .= "<meta content='text/html;charset=gb2312'>\n" ;
     $message .= "</head>\n" ;
     $message .= "<body>\n" ;
     $message .= "Message: htmlspecialchars($msg)"."\n" ;
     $message .= "</body>\n" ;
     $message .= "</html>" ;
     
     echo $message ;
     exit ;
  }
}
?>

