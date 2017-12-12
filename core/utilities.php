<?php

/**
 * Require a view with optional data
 *
 * @param string $name
 * @param array $data
 * @return void $view
 */
function view(string $name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.php";
}

/**
 * Redirect to a different page
 *
 * @param string $path
 */
function redirect(string $path) : void
{
    header("Location: {$path}");
}

/**
 * Slugify a string
 *
 * @param string $string
 * @return string $slug
 */
function slugify(string $string) : string
{
    return strtolower(str_replace(' ', '-', $string));
}
