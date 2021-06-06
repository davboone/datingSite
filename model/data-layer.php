<?php

//data-layer.php
//file used to send data to the views directory
class DataLayer
{
    static function getIndoorInterests()
    {
        return array("Tv", "Movies", "Cooking", "Board Games", "Puzzles", "Reading"
        , "Playing Cards", "Video Games");
    }

    static function getOutdoorInterests()
    {
        return array("Hiking", "Biking", "Swimming", "Collecting", "Walking",
            "Climbing");
    }
}