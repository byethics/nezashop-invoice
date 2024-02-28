<?php
function redirect($url)
{
    header("Location:$url");
    die();
}


function sanitize($str)
{
    $temp = filter_var(trim($str), FILTER_SANITIZE_SPECIAL_CHARS);
    if ($temp === false) {
        return '';
    }
    return $temp;
}
