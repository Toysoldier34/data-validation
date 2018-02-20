<?php

function validPartRegEx($str)
{
    //For Micheal
}

function validPartFunction($str)
{
    if ($str == null) return false;
    $bits = explode('-', $str);
    if (sizeof($bits) != 3) return false;
    $cat = $bits[0];
    $ware = $bits[1];
    $part = $bits[2];

    $valid = true;
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


$parts = array("AP-12-3507", "  ap-99-X109  ", "SG-05-ab20", "ab-22-N250", "SG-xx-N250", "SG-22-250", "SG-22-250*");
foreach ($parts as $part) {
    if (validPartFunction($part)) echo "$part is valid.<br>";
    else  echo "$part is not valid.<br>";
}

foreach ($parts as $part) {
    if (validPartRegEx($part)) echo "$part is valid.<br>";
    else  echo "$part is not valid.<br>";
}