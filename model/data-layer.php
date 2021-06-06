<?php

//data-layer.php
//file used to send data to the views directory
class DataLayer
{
    function indoorInterests()
    {
        return array("Tv", "Movies", "Cooking", "Board Games", "Puzzles", "Reading"
        , "Playing Cards", "Video Games");
    }

    function outdoorInterests()
    {
        return array("Hiking", "Biking", "Swimming", "Collecting", "Walking",
            "Climbing");
    }
}