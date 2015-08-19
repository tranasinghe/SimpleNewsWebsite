<?php


function __autoload($class_name) {
    
    //Load libraries
    if(stripos($class_name, 'Mymvc') !== false) {
        
        $lib = __DIR__.'/../Lib/'.str_replace("\\", "/", $class_name) . '.php';
        
        if(!file_exists($lib)) {
            echo $class_name;die;
        }
        require_once $lib;
    }
    
    //Load controler, models, views
    if(stripos($class_name, 'App') !== false) {
        $app = __DIR__.'/../'.str_replace("\\", "/", $class_name) . '.php';
        if(!file_exists($app)) {echo $app;}
        require_once $app;
     }
}

\Mymvc\Bootstrap::run();
