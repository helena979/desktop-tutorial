<?php
//Ucitavanje Config-a
require_once 'config/config.php'; 

//LOAD Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// Autoload BIBLIOTEKE

spl_autoload_register(function($className){
    require_once 'biblioteke/'. $className .'.php';
});
