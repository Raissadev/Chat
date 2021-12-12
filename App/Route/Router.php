<?php

namespace App\Route;
use App\Controllers\Site;

class Router
{
    
    public static $halts = false;
    public static $routes = array();
    public static $methods = array();
    public static $callbacks = array();
    public static $maps = array();
    public static $patterns = array( ':any' => '[^/]+', ':num' => '[0-9]+', ':all' => '.*' );
    public static $error_callback;
    public static $root;

    public static function __callstatic($method, $params) 
    {
        if ($method == 'map') {
            $maps = array_map('strtoupper', $params[0]);
            $uri = strpos($params[1], '/') === 0 ? $params[1] : '/' . $params[1];
            $callback = $params[2];
        } else {
            $maps = null;
            $uri = strpos($params[0], '/') === 0 ? $params[0] : '/' . $params[0];
            $callback = $params[1];
        }

        array_push(self::$maps, $maps);
        array_push(self::$routes, $uri);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callback);
    }

    public static function error($callback) 
    {
        self::$error_callback = $callback;
    }

    public static function haltOnMatch($flag = true)
    {
        self::$halts = $flag;
    }

    public static function dispatch()
    {
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        if (!empty(self::$root) && self::$root !== '/') {
        self::$root = rtrim(self::$root, '/');
        if (self::$root === $uri) {
            $uri = '/';
        } else {
            $uri = substr_replace($uri, '', strpos($uri, self::$root), strlen(self::$root));
        }
        }
        $method = $_SERVER['REQUEST_METHOD'];

        $searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);

        $found_route = false;

        self::$routes = preg_replace('/\/+/', '/', self::$routes);

        if (in_array($uri, self::$routes)) {
        $route_pos = array_keys(self::$routes, $uri);
        foreach ($route_pos as $route) {

            if (self::$methods[$route] == $method || self::$methods[$route] == 'ANY' || (!empty(self::$maps[$route]) && in_array($method, self::$maps[$route]))) {
            $found_route = true;

            if (!is_object(self::$callbacks[$route])) {

                $parts = explode('/',self::$callbacks[$route]);

                $last = end($parts);

                $segments = explode('@',$last);

                $controller = new $segments[0]();

                $controller->{$segments[1]}();

                if (self::$halts) return;
            } else {
                // Call closure
                call_user_func(self::$callbacks[$route]);

                if (self::$halts) return;
            }
            }
        }
        } else {
        $pos = 0;
        foreach (self::$routes as $route) {
            if (strpos($route, ':') !== false) {
            $route = str_replace($searches, $replaces, $route);
            }

            if (preg_match('#^' . $route . '$#', $uri, $matched)) {
            if (self::$methods[$pos] == $method || self::$methods[$pos] == 'ANY' || (!empty(self::$maps[$pos]) && in_array($method, self::$maps[$pos]))) {
                $found_route = true;

                array_shift($matched);

                if (!is_object(self::$callbacks[$pos])) {
                $parts = explode('/',self::$callbacks[$pos]);
                $last = end($parts);
                $segments = explode('@',$last);
                $controller = new $segments[0]();
                if (!method_exists($controller, $segments[1])) {
                    echo "controller and action not found";
                } else {
                    call_user_func_array(array($controller, $segments[1]), $matched);
                }
                if (self::$halts) return;
                } else {
                call_user_func_array(self::$callbacks[$pos], $matched);
                if (self::$halts) return;
                }
            }
            }
            $pos++;
        }
        }

        if ($found_route == false) {
            if (is_string(self::$error_callback)) {
            self::get($_SERVER['REQUEST_URI'], self::$error_callback);
            self::$error_callback = null;
            self::dispatch();
            return ;
            }
            if($_SERVER['REQUEST_URI'] == '/'){
                (new Site)->home();
            }
        }
    }
}
