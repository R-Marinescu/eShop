<?php

namespace Entities;


use DateTime;

class User
{
    private mixed $userId;
    private String $firstName;
    private String $lastName;
    private int $phoneNumber;

    public function __construct(mixed $userId, String $firstName, String $lastName, int $phoneNumber) {

        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
    }

    //Getter methods
    public function getUserId(): mixed
    {
        return $this->userId;
    }

    public function getFirstName(): String
    {
        return $this->firstName;
    }

    public function getLastName(): String
    {
        return $this->lastName;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }


    //Setter Methods
    public function setFirstName(String $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(String $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setPhoneNumber(int $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

}