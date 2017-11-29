<?php
namespace App;

class Request
{   
    /**
     * Get request URI
     *
     * @return string $uri
     */
    public static function uri() : string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Get request method
     *
     * @return string $method
     */
    public static function method() : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
