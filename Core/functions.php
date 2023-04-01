<?php

use Core\Response;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($key, $value, $dashboard_nav= false) {
    $current= $dashboard_nav ? "bg-gray-800 text-white font-semibold" : "bg-gray-900 text-white";
    $others="text-gray-300";
    return $key == $value ? $current : $others;
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

function login($user) {
    $_SESSION['user'] = $user;

    session_regenerate_id(true);

}

function logout() {
    $_SESSION=[];
    session_destroy();

    $params= session_get_cookie_params();
    setcookie("PHPSESSID", "", time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
