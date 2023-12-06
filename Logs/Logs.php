<?php

namespace Logs;

use DatabaseConfig\DriverPDO;
use DateTime;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;
use Monolog\Logger;
use Psr\Log\LogLevel;


class Logs extends AbstractProcessingHandler
{

    protected DriverPDO $driverPdo;

    public function __construct(DriverPDO $driverPdo, $level = Logger::DEBUG, $bubble = true)
    {
        $this->driverPdo = $driverPdo;
        parent::__construct($level, $bubble);
    }

    protected function write(array|LogRecord $record): void
    {
        $statement = "INSERT INTO logs (logType, logMessage, logTime) VALUES (:logType, :logMessage, :logTime)";
        $params = [
            ':logType' => $record['logType'], // Use 'level' for the PSR-3 log level
            ':logMessage' => $record['message'],
            ':logTime' => $record['logTime']->format('Y-m-d H:i:s'),
        ];

        $this->driverPdo->execute($statement, $params);
    }

    public function logError($errorMessage): void
    {
        $this->write(['logType' => LogLevel::ERROR, 'message' => $errorMessage, 'logTime' => new DateTime()]);
    }

}