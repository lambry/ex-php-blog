<?php

/**
 * Require a view with optional data.
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
