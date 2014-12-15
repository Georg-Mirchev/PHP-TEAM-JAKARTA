<?php
ob_start();
session_start();

define('DBHOST','http://pmarinov.cloudvps.bg/');
define('DBUSER','pmaruq7f');
define('DBPASS','by+Jch]92JTV');
define('DBNAME','pmaruq7f_db');
$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
date_default_timezone_set('Europe/Sofia');

function __autoload($class){
    $class = strtolower($class);
    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }
    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

}
$user = new User($db);
?>