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

$f3->route('GET|POST /personalInfo', function($f3){

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $age = $_POST['age'];
    $phoneNum = $_POST['phoneNum'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (validName($_POST['firstName'])){
            $_SESSION['fName'] = $fname;
        }
        else{
            $f3->set('errors["fname"]','Please enter a first name.');
        }
        if (validName($_POST['lastName'])){
            $_SESSION['lname'] = $lname;
        }
        else{
            $f3->set('errors["lname"]','Please enter a last name.');
        }
        if (validAge($_POST['age'])){
            $_SESSION['age'] = $age;
        }
        else{
            $f3->set('errors["age"]','Please enter an age. (18 & up)');
        }
        if (validPhone($_POST['phoneNum'])){
            $_SESSION['phoneNum'] = $phoneNum;
        }
        else{
            $f3->set('errors["phoneNum"]','Please enter a valid phone number.');
        }

        $f3->set('fname',$fname);
        $f3->set('lname',$lname);
        $f3->set('age',$age);
        $f3->set('phoneNum',$phoneNum);

        $_SESSION['gender'] = $_POST['gender'];

        if(empty($f3->get('errors'))){
            header("location: profile");
        }

    }

    //Display personal info form
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

$f3->route('GET|POST /profile', function($f3){


    $email = $_POST['email'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(validEmail($email)){
            $_SESSION['email'] = $email;
        }
        else{
            $f3->set('errors["email"]','Please enter a valid email.');
        }

        $_SESSION['state'] = $_POST['state'];
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['seeking'] = $_POST['seeking'];
        if(empty($f3->get('errors'))){
            header("location: interests");
        }

    }
    $f3->set('email',$email);
    //Display the profile form
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interests', function($f3){

    //Display the interests options

    $inDoor = $_POST['inDoor'];
    $outDoor = $_POST['outDoor'];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!empty($inDoor))
        {
            if(validIndoor($inDoor)){
                $_SESSION['inDoor'] = implode(", ", $inDoor);
            }
            else{
                $f3->set('errors["inDoor"]','Please pick valid In-door interests.');
            }
        }
        if(!empty($inDoor))
        {
            if(validIndoor($inDoor)){
                $_SESSION['outDoor'] = implode(", ", $outDoor);
            }
            else{
                $f3->set('errors["outDoor"]','Please pick valid Out-door interests.');
            }
        }
        if(empty($f3->get('errors'))){
            header("location: summary");
        }

    }

    //get the data from the model
    $f3->set("indoorInterests",indoorInterests());
    $f3->set("outdoorInterests",outdoorInterests());

    //user data
    $f3->set('inDoor',$inDoor);
    $f3->set('outDoor',$outDoor);

    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('GET /summary', function(){

    //Display the profile summary
    $view = new Template();
    echo $view->render('views/profileSummary.html');
});

//Run Fat-Free
$f3->run();