<?php
//Turn on error reporting -- this is critical
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require("vendor/autoload.php");

//Instantiate fat free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function () {
    /*$view = new Template();
    echo $view->render('views/home.html');*/
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

// define a route that accepts a food parameter
$f3->route('GET /@animal', function ($f3, $params) {
    $animal = $params['animal'];
    echo "<p>You Ordered $animal</p>";

    if ($animal == "dog") {
        echo "<p>Bark</p>";
    } else if ($animal == "cat") {
        echo "<p>Meow</p>";
    } else if ($animal == "goat") {
        echo "<p>Bleet</p>";
    } else if ($animal == "cow") {
        echo "<p>Moo</p>";
    } else if ($animal == "pig") {
        echo "<p>Oink</p>";
    } else {
        $f3->error(404);
    }
});

//Run fat free
$f3->run();
