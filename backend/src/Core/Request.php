<?php

namespace It20Academy\App\Core;

class Request
{
    private string $controller = 'Index';

    private string $method = 'index';

    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, []);

        // controller
        if (isset($uri[1]) && ! empty($uri[1])) {
            $this->controller = ucfirst($uri[1]);
        }

        // method
        if (isset($uri[2])) {
            $this->method = $uri[2];
        }
    }

    public function validateCommand(): bool
    {
        if (! class_exists("It20Academy\App\Controllers\\{$this->controller}Controller")) {
            dump("It20Academy\App\Controllers\\{$this->controller}Controller does not exists!");

            return false;
        }

        if (! method_exists("It20Academy\App\Controllers\\{$this->controller}Controller", $this->method)) {
            dump("Method {$this->method} does not exists!");

            return false;
        }

        return true;
    }

    public function getController(): string
    {
        return "It20Academy\App\Controllers\\{$this->controller}Controller";
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}