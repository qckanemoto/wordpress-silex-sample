<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

date_default_timezone_set('Asia/Tokyo');
mb_language('Japanese');

class Twig_Extension_Sample extends \Twig_Extension
{
    public function getName()
    {
        return 'Sample';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('asset_url', [$this, 'assetUrl']),
        ];
    }

    public function assetUrl($path)
    {
        return bloginfo('template_url') . '/assets/' . ltrim($path, '/');
    }
}
