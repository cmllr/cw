<?php
	define("__BUTTERPHP_ALL__","R");
    define("__APNAME__","Cowrie-Web");
	require_once "vendor/squarerootfury/butterphp/src/autoload.php";
	$router = new \BTRRouter();
    require_once "db.php";
    //Note: You _always_  need a default route for /
    $router->Route("/", function($php){
    	header("Content-Type:text/html");
        //do something. the $php parameter is very important
        //e. g. you can access a $_GET param "foo", with $php->get->foo
        $main = "./views/main.html";
        include "./views/template.html";
    });
    $router->Route("/geoip/", function($php){
    	header("Content-Type:text/html");
        $main = "./views/geoip.html";
        include "./views/template.html";
    });
    $router->Route("/passwords/", function($php){
        header("Content-Type:text/html");
        $main = "./views/passwords.html";
        include "./views/template.html";
    });
    $router->Route("/inputs/", function($php){
        header("Content-Type:text/html");
        $main = "./views/inputs.html";
        include "./views/template.html";
    });
    require_once "api.php";
    $router->execute();
?>