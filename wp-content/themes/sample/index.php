<?php
$app = new Silex\Application();
$app['debug'] = true;

$util = new SampleUtility();

// for posts.
$app->get('/archives/{route}', function ($route) use ($util) {
    return $util->renderTemplate(__DIR__ . '/views/single.php');
})->assert('route', '.*');

// for categories.
$app->get('/category/{route}', function ($route) use ($util) {
    return $util->renderTemplate(__DIR__ . '/views/category.php');
})->assert('route', '.*');

// for tags.
$app->get('/tag/{route}', function ($route) use ($util) {
    return $util->renderTemplate(__DIR__ . '/views/tag.php');
})->assert('route', '.*');

// for authors.
$app->get('/author/{route}', function ($route) use ($util) {
    return $util->renderTemplate(__DIR__ . '/views/author.php');
})->assert('route', '.*');

// default.
$app->get('/{route}', function ($route) use ($util) {
    $path = __DIR__ . '/views/pages/' . ($route ?: 'index') . '.php';
    if (file_exists($path)) {
        return $util->renderTemplate($path);
    } else {
        return $util->renderTemplate(__DIR__ . '/views/404.php');
    }
})->assert('route', '.*');

$app->run();
