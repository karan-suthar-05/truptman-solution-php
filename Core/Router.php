<?php

namespace Core;

class Router
{
    public $routes = [
        
    ];
    public function add($uri,$controller,$method = null)
    {
        $this->routes[] = compact("uri","controller","method");
        return $this;
    }
    public function get($uri,$controller)
    {
        $this->add($uri,$controller,"GET");
        return $this;
    }
    public function post($uri,$controller)
    {
        $this->add($uri,$controller,"POST");
        return $this;
    }
    public function route($uri , $method)
    {
        foreach ($this->routes as $route)
        {
            if($route["uri"] == $uri && $route["method"] == $method)
            {
                return require base_path($route["controller"]);
            }
        }
    }
}