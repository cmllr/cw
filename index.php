<?php
	define("__BUTTERPHP_ALL__","R");
	require_once "vendor/squarerootfury/butterphp/src/autoload.php";
	$router = new \BTRRouter();
    require_once "db.php";
    //Note: You _always_  need a default route for /
    $router->Route("/", function($php){
        //do something. the $php parameter is very important
        //e. g. you can access a $_GET param "foo", with $php->get->foo
        include "./views/template.html";
    });
    require_once "api.php";
    $router->execute();
?>