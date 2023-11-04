<?php

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Pimple\Container;
use Monolog\Logger;


class Logs extends AbstractProcessingHandler
{

    /**
     * @var Container
     */
    protected mixed $container;

    protected $databaseDriver;

    public function __construct(Container $container, Logger $logger, $bubble = true) {
        $this->container = $container;
        $this->databaseDriver = $container['DriverPDO'];
    }

    protected function write(LogRecord $record): void
    {

    }
}