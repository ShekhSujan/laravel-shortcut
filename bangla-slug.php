<?php

function CleanURL($string, $delimiter = '-')
{
    $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
    $string = strtolower(trim(preg_replace("/[\/_|+ -]+/", $delimiter, $string), $delimiter));
    return $string;
}