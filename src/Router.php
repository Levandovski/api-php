<?php

namespace App\Api;


class Router{
    public $routes = array();
    
    public function __construct(){   
        $this->addNewRoute("Teste", "GET", "Este é um GET");   
        $this->getRequestRoute();   
    }

    private function addNewRoute($route, $method, $resource){
        $route = array(
            "route" => $route, 
            "method" => $method, 
            "resource" => $resource
        );
        array_push($this->routes, $route);
    }

    private function getRequestRoute($route, $method, $rosource){
        $arrayStringURL = explode("/", $_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->route as $key => $route) {
           if($arrayStringURL[0] == $route[0] && $method == $route[0]);
        }
        var_dump($arrayStringURL);
    }
}