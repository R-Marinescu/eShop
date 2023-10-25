<?php

namespace Controllers;

use Pimple\Container;
use Repositories\UserRepo;

class UserController extends UserRepo {

    public function saveUser($firstName, $lastName, $phoneNumber, $DOB) {
       return $this->insertUser($firstName, $lastName, $phoneNumber, $DOB);
    }

    public function getById($id) {
        return $this->selectById($id);
    }

    public function updateUserById($userId, $firstName, $lastName, $phoneNumber, $DOB) {
        return $this->updateById($userId, $firstName, $lastName, $phoneNumber, $DOB);
    }

    public function selectAllUsers() {
        return $this->selectAll();
    }

    public function deleteUserById($id) {
        return $this->deleteById($id);
    }
}