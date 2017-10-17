<?php

namespace App\Provider;

use App\Command\AbstractCommand;
use App\Command\ExampleCommand;
use App\Console;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CommandProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $app)
    {
        /** @var Console $console */
        $console = $app['console'];

        $console
            ->add($this->setupExampleCommand(new ExampleCommand(), $app));
    }

    private function setupExampleCommand(ExampleCommand $command, Container $app)
    {
        $this->setupCommonServices($command, $app);

        return $command;
    }

    /**
     * Setup logger
     *
     * @param AbstractCommand $command
     * @param Container       $app
     * @return $this
     */
    private function setupLogger(AbstractCommand $command, Container $app)
    {
        $loggerName = str_replace(':', '_', $command->getName());

        $logger = new Logger($loggerName);

        if ($app['log.handlers.console']) {
            $logger->pushHandler(new StreamHandler('php://stdout', $app['log.level']));
        }

        $logFile = $app['log.path'] . '/' . $loggerName . '.log';
        $logger->pushHandler(new StreamHandler($logFile, $app['log.level']));

        $command->setLogger($logger);

        return $this;
    }

    /**
     * Setup common commands services
     *
     * @param AbstractCommand $command
     * @param Container       $app
     * @return $this
     */
    private function setupCommonServices(AbstractCommand $command, Container $app)
    {
        $this->setupLogger($command, $app);

        return $this;
    }
}
