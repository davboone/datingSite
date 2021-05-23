<?php

//validation.php
//validate data sent to views directory

function validName($name)
{

    return preg_match("/^[a-zA-Z]+$/",$name);
}

function validAge($age)
{
    return (18 < $age) && ($age < 118);
}
function validPhone($phoneNum)
{
    $filterNum = str_replace("-","",$phoneNum);

    return strlen($filterNum) == 10;
}
function validEmail()
{

}

function validOutdoor()
{

}
function validIndoor()
{

}