<?php

    set_include_path(get_include_path().PATH_SEPARATOR."core/main");
    
    function __autoload($object)
    {
    	require_once ("{$object}.class.php");
    }
?>
