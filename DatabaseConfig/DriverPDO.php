<?php

namespace DatabaseConfig;

use DatabaseConfig\DatabaseDriver;
use PDO;
use PDOStatement;
use Pimple\Container;

class DriverPDO extends DatabaseDriver
{
    /**
     * @var PDO|null
     */
    protected $pdo = null;

    /**
     * @var int
     * */
protected $affectedRows;
protected $container;

public function initialize() {
    if(!$this->pdo) {
        $this->checkConfig();

        $host = $this->connection['host'];
        $database = $this->connection["database"];
        $username = $this->connection["username"];
        $password = $this->connection["password"];
        $options = $this->connection["options"] ?? null;
        if(!is_array($options)) {
            $options = null;
        }

        $dsn = "mysql:host={$host};dbname={$database}";
        if(isset($this->connection["charset"])) {
            $dsn .= ';charset=' . $this->connection["charset"];
        }

        $this->pdo = new PDO($dsn, $username, $password, $options);
    }
}

public function close() {
    $this->pdo = null;
}

public function execute(string $statement, $params = []) {
    $this->initialize();

    $stmt = $this->pdo->prepare($statement);

    if($stmt) {
        $stmt->execute($params);

        if ($this->pdo === null || $this->pdo->errorInfo()[1] == "2006") {
            $this->close();
            $this->initialize();

            $stmt = $this->pdo->prepare($statement);
            $stmt->execute($params);
        }
    }

    $errorInfo = $stmt->errorInfo();
    if ($errorInfo[0] !== '00000') {
        throw new \Exception($errorInfo[2], $errorInfo[1]);
    }

    $this->affectedRows = $stmt->rowCount();
    return $stmt;
}

}