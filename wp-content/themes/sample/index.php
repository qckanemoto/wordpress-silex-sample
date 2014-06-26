<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// for posts.
$app->get('/archives/{route}', function ($route) {
    return renderTemplate(__DIR__ . '/views/single.php');
})->assert('route', '.*');

// for categories.
$app->get('/category/{route}', function ($route) {
    return renderTemplate(__DIR__ . '/views/category.php');
})->assert('route', '.*');

// for tags.
$app->get('/tag/{route}', function ($route) {
    return renderTemplate(__DIR__ . '/views/tag.php');
})->assert('route', '.*');

// for authors.
$app->get('/author/{route}', function ($route) {
    return renderTemplate(__DIR__ . '/views/author.php');
})->assert('route', '.*');

// default.
$app->get('/{route}', function ($route) {
    $path = __DIR__ . '/views/pages/' . ($route ?: 'index') . '.php';
    if (file_exists($path)) {
        return renderTemplate($path);
    } else {
        return renderTemplate(__DIR__ . '/views/404.php');
    }
})->assert('route', '.*');

$app->run();

function renderTemplate($path, $params = [])
{
    extract($params);
    ob_start();
    require $path;
    $html = ob_get_clean();
    return $html;
}
