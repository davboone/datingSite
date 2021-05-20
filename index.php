<?php
//start session
session_start();
//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Required files
require_once ('vendor/autoload.php');
require_once ('model/validation.php');
require_once ('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /personalInfo', function(){

    //Display personal info form
    $view = new Template();
    echo $view->render('views/personalInfo.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['fName'] = $_POST['firstName'];
        $_SESSION['lName'] = $_POST['lastName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phoneNum'] = $_POST['phoneNum'];
        header("location: profile");
    }
});

$f3->route('GET|POST /profile', function(){

    //Display the profile form
    $view = new Template();
    echo $view->render('views/profile.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['seeking'] = $_POST['seeking'];
        header("location: interests");
    }
});

$f3->route('GET|POST /interests', function($f3){

    //Display the interests options
    $view = new Template();
    echo $view->render('views/interests.html');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['interests'] = implode(", ", $_POST['interests']);
        header("location: summary");
    }

    //get the data from the model
    $f3->set("indoorInterests",indoorInterests());
    $f3->set("outdoorInterests",outdoorInterests());

});

$f3->route('GET /summary', function(){

    //Display the profile summary
    $view = new Template();
    echo $view->render('views/profileSummary.html');
});

//Run Fat-Free
$f3->run();