<?php
//Turn on error reporting -- this is critical
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require ("vendor/autoload.php");

//Instantiate fat free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){
    /*$view = new Template();
    echo $view->render('views/home.html');*/
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

//Run fat free
$f3->run();
