<?php

class Router {
    
    private static $routes = array();
    
    public static function route($method, $pattern, $callback) {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$method . '::' . $pattern] = $callback;
    }
    
    public static function execute() {
        foreach (self::$routes as $key => $callback) {
            $route = explode('::', $key);
            $meth = $route[0];
            $pattern = $route[1];

            if ($meth === $_SERVER['REQUEST_METHOD']
                && preg_match($pattern, $_SERVER['REQUEST_URI'], $params)
            ) {
                return call_user_func_array($callback, array_values($params));
            }
        }

        return call_user_func_array(self::$routes['GET::/^\/error$/'], [$_SERVER['REQUEST_URI']]);
    }
}