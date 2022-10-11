<?php

    $controller = ucwords($controller);
    $controllerFile = "Controllers/" . $controller . ".php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controller;

        if (method_exists($controller, $method)) {
            $controller->{$method}($params);
        }
        else{
            // echo "no existe el methodo " . $method;
            require_once("Views/404.php");
        }
    }else{
        // echo "no existe el controlador " . $controller;
        require_once("Views/404.php");
    }

?>