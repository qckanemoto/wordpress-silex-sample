<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

date_default_timezone_set('Asia/Tokyo');
mb_language('Japanese');

class SampleUtility
{
    public function renderTemplate($path, $params = [])
    {
        extract($params);
        ob_start();
        require $path;
        $html = ob_get_clean();
        return $html;
    }
}
