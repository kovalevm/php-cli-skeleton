<?php

namespace App\Provider;

use App\Command\AbstractCommand;
use App\Console;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Console\Command\Command;

class ConsoleProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $app)
    {
        $default = array(
            'app.name'    => 'PHP CLI Skeleton App',
            'app.version' => '0.0.1'
        );

        foreach ($default as $key => $value) {
            if (!$app->offsetExists($key)) {
                $app->offsetSet($key, $value);
            }
        }

        $app['console'] = function ($app) {
            return new Console($app['app.name'], $app['app.version']);
        };
    }
}
