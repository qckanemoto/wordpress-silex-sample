<?php
$app = new Silex\Application();
$app['debug'] = true;

$util = new SampleUtility();

// use twig.
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

// for authors.
$app->get('/archives/author/{route}', function ($route) use ($app, $util) {
    return $app['twig']->render('author.html.twig');
})->assert('route', '.*');

// for posts.
$app->get('/archives/{route}', function ($route) use ($app, $util) {
    return $app['twig']->render('single.html.twig');
})->assert('route', '.*');

// for categories.
$app->get('/category/{route}', function ($route) use ($app, $util) {
    return $app['twig']->render('category.html.twig');
})->assert('route', '.*');

// for tags.
$app->get('/tag/{route}', function ($route) use ($app, $util) {
    return $app['twig']->render('tag.html.twig');
})->assert('route', '.*');

// default.
$app->get('/{route}', function ($route) use ($app, $util) {
    $template = 'pages/' . trim($route, '/') . '.html.twig';
    try {
        return $app['twig']->render($template);
    } catch (Twig_Error $e) {
        $template = 'pages/' . trim($route, '/') . '/index.html.twig';
        try {
            return $app['twig']->render($template);
        } catch (Twig_Error $e) {
            return $app['twig']->render('404.html.twig');
        }
    }
})->assert('route', '.*');

$app->run();
