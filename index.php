<?php
//Turn on error reporting -- this is critical
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require("vendor/autoload.php");

//Instantiate fat free
$f3 = Base::instance();

session_start();
//Define default route

$f3->route('GET /', function () {
    /*$view = new Template();
    echo $view->render('views/form1.html');*/
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

//Define default route
$f3->route('GET /order', function () {
    $view = new Template();
    echo $view->render('views/form1.html');
    /*echo "<h1>My Pets</h1>";*/
    //echo "<a href='order'>Order a Pet</a>";
});


$f3->route('GET /@item', function ($f3, $params) {
    $item = $params['item'];
    echo "<p>Your animal is $item</p>";

    if ($item == "dog") {
        echo "<p>bark</p>";
    } else if ($item == "cat") {
        echo "<p>Meow</p>";
    } else if ($item == "cow") {
        echo "<p>Moo</p>";
    } else if ($item == "goat") {
        echo "<p>bleet</p>";
    } else if ($item == "pig") {
        echo "<p>oink</p>";
    } else {
        $f3->error(404);
    }
});

//Define default route
$f3->route('POST /order2', function () {
    $_SESSION['pet'] = $_POST['input'];
    $view = new Template();
    echo $view->render('views/form2.html');
    /*echo "<h1>My Pets</h1>";*/
    //echo "<a href='order'>Order a Pet</a>";
});

$f3->route('POST /results', function () {
    $_SESSION["color"] = $_POST["color"];

    $view = new Template();
    echo $view->render("views/results.html");
});

//Run fat free
$f3->run();
