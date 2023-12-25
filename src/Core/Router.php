<?php

namespace Core;

class Router {
    private $routes = [];

    public function addRoute($method, $path, $controllerMethod) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controllerMethod' => $controllerMethod,
        ];
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        var_dump($path);
        var_dump($this->routes);
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $path)) {
                $this->callControllerMethod($route['controllerMethod']);
                return;
            }
        }

        http_response_code(404);
        echo "Not Found";
    }

    private function matchPath($pattern, $path) {
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';
        return preg_match($pattern, $path);
    }

    private function callControllerMethod($controllerMethod) {
        list($controllerName, $methodName) = explode('@', $controllerMethod);

        if (class_exists($controllerName)) {
            $controller = new ("\Controller\\" . $controllerName)();

            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo "Method not found in controller.";
            }
        } else {
            echo "Controller not found.";
        }
    }
}