<?php
$app = new Silex\Application();
$app['debug'] = true;

$util = new SampleUtility();

// use twig.
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

// add twig functions.
$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    $twig->addExtension(new \Twig_Extension_Sample($app));
    $twig->addFunction('bloginfo', new \Twig_SimpleFunction('bloginfo', 'bloginfo'));
    $twig->addFunction('query_posts', new \Twig_SimpleFunction('query_posts', 'query_posts'));
    $twig->addFunction('wp_reset_query', new \Twig_SimpleFunction('wp_reset_query', 'wp_reset_query'));
    $twig->addFunction('home_url', new \Twig_SimpleFunction('home_url', 'home_url'));
    $twig->addFunction('get_posts', new \Twig_SimpleFunction('get_posts', 'get_posts'));
    $twig->addFunction('have_posts', new \Twig_SimpleFunction('have_posts', 'have_posts'));
    $twig->addFunction('the_post', new \Twig_SimpleFunction('the_post', 'the_post'));
    $twig->addFunction('the_permalink', new \Twig_SimpleFunction('the_permalink', 'the_permalink'));
    $twig->addFunction('the_title', new \Twig_SimpleFunction('the_title', 'the_title'));
    $twig->addFunction('the_content', new \Twig_SimpleFunction('the_content', 'the_content'));
    $twig->addFunction('the_author', new \Twig_SimpleFunction('the_author', 'the_author'));
    $twig->addFunction('the_category', new \Twig_SimpleFunction('the_category', 'the_category'));
    $twig->addFunction('the_tags', new \Twig_SimpleFunction('the_tags', 'the_tags'));
    $twig->addFunction('single_cat_title', new \Twig_SimpleFunction('single_cat_title', 'single_cat_title'));
    $twig->addFunction('single_tag_title', new \Twig_SimpleFunction('single_tag_title', 'single_tag_title'));
    $twig->addFunction('the_author_posts_link', new \Twig_SimpleFunction('the_author_posts_link', 'the_author_posts_link'));
    return $twig;
}));

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
