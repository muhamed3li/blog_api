<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function abort($message, $code = 404)
{
    throw new Exception($message, $code);
}

function base_path($path)
{
    return BASE_PATH . $path;
}
