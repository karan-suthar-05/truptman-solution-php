<?php

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

function view($path)
{
    return require base_path("views/{$path}");
}

function redirect($uri)
{
    header("location: {$uri}");
    exit();
}