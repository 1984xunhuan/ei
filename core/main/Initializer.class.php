<?php

    class Initializer
    {
    	public static function initialize()
    	{
    		set_include_path(get_include_path().PATH_SEPARATOR."core/main");
    		set_include_path(get_include_path().PATH_SEPARATOR."core/config");
    		set_include_path(get_include_path().PATH_SEPARATOR."core/db");
    		set_include_path(get_include_path().PATH_SEPARATOR."core/library");
    		set_include_path(get_include_path().PATH_SEPARATOR."app/controllers");
    		set_include_path(get_include_path().PATH_SEPARATOR."app/models");
    		set_include_path(get_include_path().PATH_SEPARATOR."app/views");
    		set_include_path(get_include_path().PATH_SEPARATOR."public/admin");
    		set_include_path(get_include_path().PATH_SEPARATOR."public/web");
    		set_include_path(get_include_path().PATH_SEPARATOR."public/wap");
    	}
    }
?>