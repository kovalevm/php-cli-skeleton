<?php
require_once __DIR__ . '/../vendor/autoload.php';

$env = ($env = getenv('APPLICATION_ENV')) ?: 'prod';

$app = new \App\Application();

$app['base_path'] = dirname(dirname(__FILE__));

require_once $app['base_path'] . '/app/config/config.php';
require_once $app['base_path'] . '/app/providers.php';

return $app;
