<?php

//array to test against
$parts = array("AP-12-3507", "  ap-99-X109  ", "SG-05-ab20", "ab-22-N250", "SG-xx-N250", "SG-22-250", "SG-22-250*");


/***** PART 2 *****/
//tests regular expressions
foreach ($parts as $part) {
    if (validPartRegEx($part)) echo "$part is valid.<br>";
    else  echo "$part is not valid.<br>";
}

function validPartRegEx($str)
{
    //For Micheal
    return true;
}


/***** PART 1 *****/
//tests built in php function method
foreach ($parts as $part) {
    if (validPartFunction($part)) echo "$part is valid.<br>";
    else  echo "$part is not valid.<br>";
}

function validPartFunction($str)
{
    if ($str == null) return false;  //check if null
    $trim = trim($str);  //removes blank space at start and end
    $bits = explode('-', $trim);  //splits string into string array at each -
    if (sizeof($bits) != 3) return false;  //if incorrect number of segments
    //puts array parts into separate variables
    $cat = $bits[0];
    $ware = $bits[1];
    $part = $bits[2];


    $valid = validCat($cat);
    $valid = validWare($ware);
    $valid = validPart($part);

    return $valid;
}

function validCat($cat)
{
    $cat = strtoupper($cat);
    if ($cat == "HW" | $cat == "SG" | $cat == "AP") return true;
    return false;
}

function validWare($ware)
{
    return true;
}

function validPart($part)
{
    return true;
}


