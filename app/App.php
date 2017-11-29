<?php

class App
{
    use App\Router;

    // Store keys
    protected static $store = [];

    /**
     * Bind a new key/value into the container
     *
     * @param string $key
     * @param mixed $value
     */
    public static function bind(string $key, $value) : void
    {
        static::$store[$key] = $value;
    }

    /**
     * Retrieve and use a value from the store
     *
     * @param string $key
     * @return mixed $value
     */
    public static function use(string $key)
    {
        if (array_key_exists($key, static::$store)) {
            return static::$store[$key];
        }
        
        throw new Exception("{$key} not bound to app");
    }

}
