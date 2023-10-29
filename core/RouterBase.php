<?php
namespace JDT\core;

use JDT\core\HttpRequest;

class RouterBase
{
    private $routes = [];
    private $prefix;

    public function get($route, $handler)
    {
        $this->addRoute('GET', $route, $handler);
    }

    public function post($route, $handler)
    {
        $this->addRoute('POST', $route, $handler);
    }

    public function put($route, $handler)
    {
        $this->addRoute('PUT', $route, $handler);
    }

    public function group($prefix, $callback)
    {
        $this->prefix = $prefix;
        $callback($this);
        $this->prefix = '';
    }

    private function addRoute($method, $route, $handler)
    {
        $route = $this->prefix . $route; // Add prefix to the route

        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'handler' => $handler
        ];
    }

    // public function dispatch()
    // {
    //     $requestMethod = $_SERVER['REQUEST_METHOD'];
    //     // $requestUri = $_SERVER['REQUEST_URI'];
    //     // remove the /reports and Get the requested URL
    //     $requestUri = implode('',explode('/reports',$_SERVER['REQUEST_URI']));

    //     foreach ($this->routes as $route) {
    //         $routeMethod = $route['method'];
    //         $routePattern = $this->getRoutePattern($route['route']);
    //         $handler = $route['handler'];
    //         if ($requestMethod === $routeMethod && preg_match($routePattern, $requestUri, $matches)) {
    //             array_shift($matches);

    //             if (is_callable($handler)) {
    //                 call_user_func_array($handler, $matches);
    //             } else {
    //                 [$controller, $method] = explode('::', $handler);
    //                 $controller = 'controller\\' . $controller;
    //                 $controllerInstance = new $controller();
    //                 $params = array_values($matches); // Convert named matches to positional arguments
    //                 echo call_user_func_array([$controllerInstance, $method], $params);
    //             }

    //             return;
    //         }
    //         // else{
    //         //         echo 'Page not found.';
    //         // }
    //     }

    //     // No matching route found
    //     echo "404 Not Found";
    // }
    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = implode('', explode('/reports', $_SERVER['REQUEST_URI']));

        foreach ($this->routes as $route) {
            $routeMethod = $route['method'];
            $routePattern = $this->getRoutePattern($route['route']);
            $handler = $route['handler'];
            // var_dump($routePattern);
            // echo '<br>';
            // var_dump($requestUri);
            // echo '<br>';
            if ($requestMethod === $routeMethod && preg_match($routePattern, $requestUri, $matches)) {
                array_shift($matches);

                $request = new HttpRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $_GET, getallheaders(), $_REQUEST);


                if (is_callable($handler)) {
                    call_user_func_array($handler, $matches);
                } else {
                    [$controller, $method] = explode('::', $handler);
                    $controller = 'JDT\controller\\' . $controller;
                    $controllerInstance = new $controller();
                    // this is for the route like this /about/{param1}/{param2}/{param3}
                    //todo
                    $params = $this->matchRouteUriData($route['route'],$matches);
                    if (method_exists($controllerInstance, $method)) {
                        // call_user_func_array([$controllerInstance, $method], $params);
                        echo call_user_func_array([$controllerInstance, $method], [$request]);
                    } else {
                        echo "404 Not Found";
                    }
                }

                return;
            }
        }

        // No matching route found
        echo "404 Not Found";
    }

    private function matchRouteUriData($routes,$data){
        preg_match_all('/{([^}]+)}/', $routes, $matches);
        $parameters = $matches[1];

        $params = [];
        foreach ($parameters as $key => $value) {
            $params[] = $data[$value];
        }
        return $params;
    }

    private function getRoutePattern($route)
    {
        $pattern = str_replace('/', '\/', $route);
        $pattern = preg_replace('/{(\w+)}/', '(?P<$1>[^\/]+)', $pattern);
        // $pattern = preg_replace('/{(\w+)}/', '(?:[^\/]+)', $pattern);
        $pattern = '/^' . $pattern . '$/';
    
        return $pattern;
    }

}