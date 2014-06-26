<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/{route}', function ($route) {
    $path = __DIR__ . '/views/' . ($route ?: 'index') . '.php';
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
