<?php 
require __DIR__ . '/bootstrap.php';

$app = new App();

$app->get('/', 'Posts@index');
$app->get('/posts/:slug', 'Posts@show');

$app->run();
