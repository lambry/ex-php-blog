<?php
namespace App;

use App\Request;
use Exception;

trait Router
{
    // Registered routes and Controllers 'path'
    public $routes = [];
    public $controllers = __NAMESPACE__ . '\Controllers';

    /**
     * Register GET route
     *
     * @param string $uri
     * @param string $controller
     */
    public function get(string $uri, string $controller) : void
    {
        $this->routes[] = ['GET', $uri, $controller];
    }

    /**
     * Register POST route
     *
     * @param string $uri
     * @param string $controller
     */
    public function post(string $uri, string $controller) : void
    {
        $this->routes[] = ['POST', $uri, $controller];
    }

    /**
     * Run the app by routing to a controller
     * 
     * @return callable $load
     */
    public function run()
    {
        $match = $this->exactMatch() ?: $this->wildcardMatch();

        if ($match) {
            return $this->load(...explode('@', $match));
        }

        throw new Exception('Undefined route');
    }

    /**
     * Exact match the route to a controller
     * 
     * @return string|boolean $exactMatch|false
     */
    public function exactMatch()
    {
        foreach($this->routes as [$method, $uri, $controller]) {
            if ($method === Request::method() && $uri === Request::uri()) {
                $exactMatch = $controller;
                break;
            }
        }

        return $exactMatch ?? false;
    }

    /**
     * Match the route to a controller
     * 
     * @return string|boolean $wildcardMatch|false
     */
    public function wildcardMatch()
    {   
        foreach($this->routes as [$method, $uri, $controller]) {
            $matchedParts = [];
            $uriParts = explode('/', $uri);
            $reqParts = explode('/', Request::uri());

            foreach($uriParts as $key => &$part) {
                if (strpos($part, ':') === 0) {
                    $matchedParts[] = $reqParts[$key];
                    $part = $reqParts[$key];
                }
            }

            if ($method === Request::method() && implode('/', $uriParts) === Request::uri()) {
                $wildcardMatch = $matchedParts ? $controller . '@' . implode('@', $matchedParts) : $controller;
                break;
            }
        }
        
        return $wildcardMatch ?? false;
    }

    /**
     * Load the controller and call method
     *
     * @param string $controller
     * @param string $action
     * @param mixed $vars
     * @return callable $action
     */
    protected function load(string $controller, string $action, ...$vars)
    {
        $controller = "{$this->controllers}\\{$controller}";
        $class = new $controller;

        if (method_exists($class, $action)) {
            return $class->$action(...$vars);
        }
        
        throw new Exception("{$action} method not define on {$controller}");
    }
}
