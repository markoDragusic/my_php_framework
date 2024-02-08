<?php namespace System;

use System\View;

class BaseController {
    /**
     * view variable to use the view class
     */
    public $view;

    /**
     * url variable to get the current relative url
     * @var string
     */
    public $url;

    public function __construct(){
        $this->view = new View();
        $this->url = $this->getUrl();

        if (ENVIRONMENT == 'development') {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }
    }

    protected function getUrl(){
        $url = isset($_SERVER['REQUEST_URI']) ? rtrim($_SERVER['REQUEST_URI'], '/') : NULL;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return $this->url = $url;
    }
}