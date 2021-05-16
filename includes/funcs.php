<?php


function safe_data($var)
{
    $_POST[$var] ??= '';
    return htmlspecialchars(stripslashes($_POST[$var]));
}

function requiredRule($requiredName)
{
    return $requiredName . " is required";
}