<?php
namespace Repositories;

use Pimple\Container;
use DatabaseConfig\DriverPDO;

abstract class BaseRepository
{
    /**
     * @var Container
     */
    protected mixed $container;

    protected $databaseDriver;
    /**
     * @return void
     */

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->databaseDriver = $container['DriverPDO'];
    }

    //protected function execute($statement, ?string $marker = null)
    protected function execute($statement, $params = [])
    {
        try {
            return $this->databaseDriver->execute($statement, $params);
        } catch (\Throwable $th) {
            echo "An error occurred: " . $th->getMessage();
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
            //$this->logger->critical($th->getMessage(), 'getAffectedRows', 'There is no connection');
            return 0;
        }
    }
}
