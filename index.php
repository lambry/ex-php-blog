<?php 
require __DIR__ . '/bootstrap.php';

$app = new App();

// Main display routes
$app->get('/', 'Posts@index');
$app->get('/posts/:slug', 'Posts@show');

// Admin post management routes
$app->get('/admin/new', 'Admin@form');
$app->get('/admin/edit/:id', 'Admin@form');
$app->post('/admin/new', 'Admin@add');
$app->post('/admin/edit/:id', 'Admin@edit');
$app->post('/admin/delete/:id', 'Admin@delete');

// Start
$app->run();
