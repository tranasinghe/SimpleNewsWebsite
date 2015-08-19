<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 'On');


define('APPPATH', __DIR__.'/../App');

//@todo  develop helper function to get base url
define('BASEURL', $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME']);

require __DIR__.'/../Bootstrap/autoload.php';
