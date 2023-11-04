<?php

namespace Repositories;

use DatabaseConfig\DatabaseConfig;
use PDO;

class UserRepo extends BaseRepository
{

    public function insertUser($firstName, $lastName, $phoneNumber, $DOB)
    {
        $statement = "INSERT INTO users (firstName, lastName, phoneNumber, DOB) VALUES (:firstName, :lastName, :phoneNumber, :DOB)";
        $params = [
            ':firstName'    => $firstName,
            ':lastName'     => $lastName,
            ':phoneNumber'  => $phoneNumber,
            ':DOB'          => $DOB
        ];

        $queryResult = $this->execute($statement, $params);
        $affectedRows = $this->getAffectedRows();

        if ($affectedRows > 0) {
            return "Inserted $affectedRows row(s)";
        } else {
            echo $queryResult;
            return " Insertion failed";
        }
    }

    public function updateById($userId, $firstName, $lastName, $phoneNumber, $DOB) {
        $statement = "UPDATE users SET firstName = :firstName, lastName = :lastName, phoneNumber = :phoneNumber, DOB = :DOB WHERE userId = :userId";
        $params = [
          ':userId'         => $userId,
          ':firstName'      => $firstName,
          ':lastName'       => $lastName,
          ':phoneNumber'    => $phoneNumber,
          ':DOB'            => $DOB
        ];
        $queryResult = $this->execute($statement, $params);

        return $queryResult;
    }

    public function selectById($id) {
        $statement = "SELECT * FROM users WHERE userId = :userId";
        $params = [':userId' => $id];

        $queryResult = $this->fetchAssoc($statement, $params);

        if ($queryResult === false) {
            return ['error' => "This id: $id does not exist"];
        }

        return $queryResult;
    }


    public function selectAll() {
        $statement = "SELECT * FROM users";

        $queryResult = $this->execute($statement)->fetchAll(PDO::FETCH_ASSOC);

        return $queryResult;
    }

    public function deleteById($id) {
        $statement = "DELETE FROM users WHERE userId = :userId";
        $params = [':userId' => $id];

        $stmt = $this->execute($statement, $params);

        $affectedRows = $this->getAffectedRows($stmt);

        return "Deleted $affectedRows row(s) with id $id";
    }

}