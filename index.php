<?php

session_start();

//
header("Content-Type:text/html;charset=utf-8");
//
include ("core/main/Ini.func.php");
Initializer::initialize();
$router = Loader::load("Router");
Dispatcher::dispatch($router);

?>