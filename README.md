# EX PHP Blog

A very basic, completely fictitious PHP example blog.

### Routes

```php
// Main display routes
$app->get('/', 'Posts@index');
$app->get('/posts/:slug', 'Posts@show');

// Admin post management routes
$app->get('/admin/new', 'Admin@form');
$app->get('/admin/edit/:id', 'Admin@form');
$app->post('/admin/new', 'Admin@add');
$app->post('/admin/edit/:id', 'Admin@edit');
$app->post('/admin/delete/:id', 'Admin@delete');
```