<?php

//validation.php
//validate data sent to views directory
class Validation
{


    static function validName($name)
    {

        return preg_match("/^[a-zA-Z]+$/", $name);
    }

    static function validAge($age)
    {
        return (18 <= $age) && ($age < 118);
    }

    static function validPhone($phoneNum)
    {
        $filterNum = str_replace("-", "", $phoneNum);

        return strlen($filterNum) == 10;
    }

    static function validEmail($email)
    {
        return preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
    }

    static function validOutdoor($interest)
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

    static function validIndoor($interest)
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
}