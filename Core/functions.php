<?php

use Core\Response;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($heading,$value) {
    $current="bg-gray-900 text-white";
    $others="text-gray-300";    
    return $heading == $value ? $current : $others;
}

function authorize($condition, $code=Response::FORBIDDEN) {
    if ($condition) {
        abort($code);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path) {
    return base_path("views/{$path}");
}

function abort($code=Response::NOT_FOUND) {
    http_response_code($code);
    require view("{$code}.php");
    die();
}
