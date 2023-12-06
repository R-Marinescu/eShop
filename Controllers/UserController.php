<?php

namespace Controllers;

use Entities\User;
use Logs\Logs;
use Repositories\UserRepo;

class UserController
{
    /**
     * @var UserRepo
     */
    protected UserRepo $userRepo;
    /**
     * @var Logs
     */
    protected Logs $logger;

    public function __construct(UserRepo $userRepo, Logs $logger)
    {
        $this->userRepo = $userRepo;
        $this->logger = $logger;
    }

    public function createUser(User $user)
    {
        $result = $this->userRepo->insertUser($user);
        return $result ?: "Unable to create user; phone number already exists.";
    }

    public function getById($id): string|User
    {
        $result = $this->userRepo->selectById($id);
        return $result ?: "User with id $id does not exist";
    }

    public function updateUserById(User $user): int|string
    {
       $result = $this->userRepo->updateUser($user);
       $userId = $user->getUserId();
       return $result === 1 ? "User with id: $userId has been updated" : " User with id $userId has not been update or does not exist";
    }

    public function selectAllUsers(): array
    {
        return $this->userRepo->selectAll();
    }

    public function deleteUserById($id): int|string
    {
        $result = $this->userRepo->deleteById($id);
        return $result === 1 ? "User with id $id has been deleted" : "User with id $id does not exist";
    }
}