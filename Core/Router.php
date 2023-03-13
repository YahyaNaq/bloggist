<?php

namespace Core;

class Router {

    protected $routes=[];

    protected function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri']==$uri && $route['method']==$method) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code=Response::NOT_FOUND)
    {
        http_response_code($code);
        require view("{$code}.php");
        die();
    }


}