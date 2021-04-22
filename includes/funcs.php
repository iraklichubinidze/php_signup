<?php


function safe_data($var): string
{
    $_POST[$var] ??= '';
    return htmlspecialchars(stripslashes($_POST[$var]));
}