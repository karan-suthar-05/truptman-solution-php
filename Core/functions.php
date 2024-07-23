<?php
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
function base_path($path)
{
    return BASE_PATH . "$path";
}

function view($path,array $mydata = [])
{   
    $data = $mydata;
    return require base_path("views/{$path}");
}

function redirect($uri)
{
    header("location: {$uri}");
    exit();
}