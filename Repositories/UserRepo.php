<?php

namespace Repositories;

use DatabaseConfig\DriverPDO;
use Entities\User;
use Logs\Logs;
use PDO;
use Pimple\Container;

class UserRepo extends BaseRepository
{

    public function __construct(DriverPDO $pdo, Logs $logger)
    {
        parent::__Construct($pdo, $logger);
    }

    public function insertUser(User $user)
    {

        $statement = "INSERT INTO users (FirstName, LastName, PhoneNumber) VALUES (:FirstName, :LastName, :PhoneNumber)";
        $params = [
            ':FirstName' => $user->getFirstName(),
            ':LastName' => $user->getLastName(),
            ':PhoneNumber' => $user->getPhoneNumber(),
        ];

        return $this->execute($statement, $params);
    }

    public function updateUser(User $user)
    {

        $statement = "UPDATE users SET FirstName = :FirstName, LastName = :LastName, PhoneNumber = :PhoneNumber WHERE UserId = :UserId";
        $params = [
            ':UserId' => $user->getUserId(),
            ':FirstName' => $user->getFirstName(),
            ':LastName' => $user->getLastName(),
            ':PhoneNumber' => $user->getPhoneNumber(),
        ];
        $this->execute($statement, $params);
        return $this->getAffectedRows();
    }

    public function selectById($id): ?User
    {

        $statement = "SELECT * FROM users WHERE UserId = :UserId";
        $params = [':UserId' => $id];

        $userData = $this->fetchAssoc($statement, $params);

        return $userData ? new User(
            $userData['UserId'],
            $userData['FirstName'],
            $userData['LastName'],
            $userData['PhoneNumber'],
        ) : null;
    }

    public function selectAll(): array
    {

        $statement = "SELECT * FROM users";
        $usersData = $this->execute($statement)->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($usersData as $userData) {
            $users[] = new User(
              $userData['UserId'],
              $userData['FirstName'],
              $userData['LastName'],
              $userData['PhoneNumber'],
            );
        }
        return $users;
    }

    public function deleteById($id)
    {
        $statement = "DELETE FROM users WHERE UserId = :UserId";
        $params = [':UserId' => $id];

        $this->execute($statement, $params);

        return $this->getAffectedRows();
    }

}