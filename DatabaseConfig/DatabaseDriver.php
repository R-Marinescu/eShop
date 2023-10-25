<?php

namespace DatabaseConfig;

use Exception;

abstract class DatabaseDriver implements DatabaseInterface
{

    protected $connection = [];
    protected $validConfig;

    public function __construct(){
        $this->validConfig = false;
    }

    /**
     * @param array $connection
     * @throws Exception
     */
    public function setConnectionConfig(array $connection){
        $this->validateConnectionConfig($connection);
        $this->connection = $connection;
        $this->close();
    }

    protected function validateConnectionConfig(array $connection)
    {
        if (!isset($connection['host'])){
            throw new Exception("Parameter host was not set");
        }
        if (!$connection['username']){
            throw new Exception("Parameter username was not set");
        }
        if (!isset($connection['password'])){
            throw new Exception("Parameter password was not set");
        }
        if (!isset($connection['database'])){
            throw new Exception("Parameter dbName was not set");
        }
        $this->validConfig = true;
    }

    /**
     * @throws Exception
     */
    protected function checkConfig(){
        if(!$this->validConfig){
            if($this->connection === []) {
                throw new Exception('No database config');
            }
            $this->validateConnectionConfig($this->connection);
        }
    }

}