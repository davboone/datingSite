<?php

//validation.php
//validate data sent to views directory

function validName($name)
{

    return preg_match("/^[a-zA-Z]+$/",$name);
}

function validAge($age)
{
    return (18 <= $age) && ($age < 118);
}
function validPhone($phoneNum)
{
    $filterNum = str_replace("-","",$phoneNum);

    return strlen($filterNum) == 10;
}
function validEmail($email)
{
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validOutdoor($interest)
{
    $validOutdoor = outdoorInterests();
    foreach ($interest as $userChoice) {
        if (!in_array($userChoice, $validOutdoor)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}
function validIndoor($interest)
{
    $validIndoor = indoorInterests();
    foreach ($interest as $userChoice) {
        if (!in_array($userChoice, $validIndoor)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}