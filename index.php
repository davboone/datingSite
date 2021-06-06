<?php

//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Required files
require_once ('vendor/autoload.php');

//start session
session_start();

//Instantiate classes
$f3 = Base::instance();
$con = new Controller($f3);
$dataLayer = new DataLayer();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /personalInfo', function(){

    $GLOBALS['con']->personalInfo();

});

$f3->route('GET|POST /profile', function($f3){


    $GLOBALS['con']->profile();
});

$f3->route('GET|POST /interests', function(){


    $GLOBALS['con']->interests();

});

$f3->route('GET /summary', function(){

    $GLOBALS['con']->summary();
});

//Run Fat-Free
$f3->run();