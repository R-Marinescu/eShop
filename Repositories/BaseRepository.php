<?php

namespace Repositories;

use DatabaseConfig\DriverPDO;
use Logs\Logs;
use Pimple\Container;

abstract class BaseRepository
{

    protected mixed $databaseDriver;

    protected mixed $logger;

    public function __construct(DriverPDO $pdo, Logs $logger)
    {
        $this->databaseDriver = $pdo;
        $this->logger = $logger;
    }

    public function execute($statement, $params = [])
    {

        try {
            return $this->databaseDriver->execute($statement, $params);

        } catch (\Throwable $th) {
            $errorMessage = "Query statement: $statement - Error: " . $th->getMessage();
            $this->logger->logError($errorMessage);
            return false;
        }
    }


    /**
     * @param string $statement
     * @param array|null $params
     */
    protected function fetchAssoc($statement, array $params = null)
    {
        try {
            // Fetch the data
            $fetchResult = $this->databaseDriver->fetchAssoc($statement, $params);

            // Return the fetched data directly
            return $fetchResult;
        } catch (\Throwable $th) {
            echo "An error occurred: " . $th->getMessage();
            return null;
        }
    }

    protected function getInsertedId()
    {
        try {
            return $this->databaseDriver->getInsertId();
        } catch (\Throwable $th) {
            //$this->logger->critical($th->getMessage(), 'getInsertId', 'There is no connection');
            return 0;
        }
    }

    protected function getAffectedRows()
    {
        try {
            return $this->databaseDriver->getAffectedRows();
        } catch (\Throwable $th) {
            $errorMessage = "An error occurred: " . $th->getMessage();
            $this->logger->logError($errorMessage);
            return 0;
        }
    }
}
