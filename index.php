<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
//require_once 'vendor/autoload.php';
require 'config.php';
require 'routers.php';

spl_autoload_register(function ($class){
    if(file_exists('controllers/'.$class.'.php')) {
            require_once 'controllers/'.$class.'.php';
    } elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    }
});


$core = new Core();
$core->run();
?>