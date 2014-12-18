<link rel="stylesheet" href="css/style.css"/>
<script src="https://code.jquery.com/jquery-git2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
<?php

ob_start();
session_start();

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','db');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



date_default_timezone_set('Europe/London');


function __autoload($class) {

    $class = strtolower($class);


    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }


    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }


    $classpath = '../../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

}

$user = new User($db);
?>