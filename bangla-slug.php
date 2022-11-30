<?php

function CleanURL($string, $delimiter = '-')
{
    $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
    $string = strtolower(trim(preg_replace("/[\/_|+ -]+/", $delimiter, $string), $delimiter));
    return $string;
}

$slug = CleanURL(" সম্পন্ন !#$%$%^ হল বঙ্গবন্ধু&**( টানেলের //? প্রথম টিউবের )()(**@%$^&*( কাজ  ");
echo $slug;

// Output: সম্পন্ন হল বঙ্গবন্ধু টানেলের প্রথম টিউবের কাজ