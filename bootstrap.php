<?php
require __DIR__ . '/vendor/autoload.php';

use App\Database;

App::bind('config', require 'config.php');

App::bind('database', new Database(
    Database::connect(App::use('config')['database'])
));
