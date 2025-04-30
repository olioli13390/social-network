<?php

class Router
{
    public function start()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            if ($uri !== "/") {
                $controller = ucfirst(explode('/', $uri)[1]) . "Controller";
                if (class_exists($controller)) {
                    $instance = new $controller();
                    $instance->index();
                } else {
                    include_once '../views/error.php';
                }
            } else {
                $instance = new LoginController();
                $instance->index();
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
