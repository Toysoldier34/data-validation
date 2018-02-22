<?php

/*
 * Tony Thompson & Micheal Horn
 * 2/20/18
 * http://athompson.greenriverdev.com/328/pairprogram/data-validation/
 * tests validity of given part numbers with regular expressions and without
 */

//array to test against
$parts = array("AP-12-3507", "  ap-99-X109  ", "SG-05-ab20", "ab-22-N250", "SG-xx-N250", "SG-22-250", "SG-22-250*", "HW-45-AX54");


/***** PART 1 *****/
echo "<h4> Part 1</h4>";
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

    $valid = true;
    //check department category
    $cat = strtoupper($bits[0]);
    if (!(($cat == "HW" || $cat == "SG" || $cat == "AP") && (strlen($cat) == 2))) {
        $valid = false;
    }
    //check warehouse number
    if (!(ctype_digit($bits[1]) && (strlen($bits[1]) == 2))) {
        $valid = false;
    }
    //check part number
    if (!(ctype_alnum($bits[2]) && (strlen($bits[2]) == 4))) {
        $valid = false;
    }
    return $valid;
}


/***** PART 2 *****/
echo "<h4> Part 2</h4>";
//tests regular expressions
foreach ($parts as $part) {
    if (validPartRegEx($part)) echo "$part is valid.<br>";
    else  echo "$part is not valid.<br>";
}

function validPartRegEx($str)
{
    $expression = "/^(hw)*(sg)*(AP)*-\d{2}-\w{4}$/i";
    $replace = "/\s+/";
    $clean = preg_replace($replace,'',$str);
    if(preg_match($expression,$clean))
    {
        return true;
    }
    else
    {
        return false;
    }
}








