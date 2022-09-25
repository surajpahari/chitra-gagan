<?php
//loads the require library
 require_once 'config/config.php';
 //load helper
 require_once 'helpers/url_helper.php';
 require_once 'helpers/session_helper.php';
//autoload all the required library
spl_autoload_register(function($class_name){
    require_once('libraries/'. $class_name . '.php');
});
