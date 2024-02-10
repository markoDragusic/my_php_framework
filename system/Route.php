<?php

namespace System;

use System\View;

class Route
{
    public function __construct($config)
    {

        $url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $controller = ucfirst(!empty($url[0]) ? $url[0] : $config['default_controller']);
        $method = !empty($url[1]) ? $url[1] : $config['default_method'];
        $args = !empty($url[2]) ? array_slice($url, 2) : array();
        $class = $config['namespace'] . $controller;

        if (!class_exists($class)) {
            return $this->not_found();
        }


        if (!method_exists($class, $method)) {
            return $this->not_found();
        }

        if (class_exists(($class))) {
            $classInstance = new $class();
        }

        call_user_func_array(array($classInstance, $method), $args);
    }

    public function not_found()
    {
        $view = new View();
        return $view->render('404');
    }
}
