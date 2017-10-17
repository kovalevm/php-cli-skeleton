<?php
/* @var $app \App\Application */

$app['app.name'] = 'PHP CLI Skeleton App';
$app['app.version'] = '1.0.0';

$app['log.path'] = $app['base_path'] . '/logs';
$app['log.level'] = \Monolog\Logger::DEBUG;
$app['log.handlers.console'] = true;

