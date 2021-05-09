<?php
//start session
session_start();
//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personalInfo', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/personalInfo.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['fName'] = $_POST['firstName'];
        $_SESSION['lName'] = $_POST['lastName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phoneNum'] = $_POST['phoneNum'];
    }
});

$f3->route('GET|POST /profile', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/profile.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['seeking'] = $_POST['seeking'];
    }
});

//$f3->route('GET /', function(){
//
//    //Display the home page
//    $view = new Template();
//    echo $view->render('');
//});

//$f3->route('GET /', function(){
//
//    //Display the home page
//    $view = new Template();
//    echo $view->render('');
//});

//Run Fat-Free
$f3->run();