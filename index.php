<?php

use Entities\User;

require 'bootstrap.php';

$testController = $container['UserController'];
$userId = 4;
$firstName = 'Alex';
$lastName = 'Tofanica';
$phoneNumber = '11';

$user = new User($userId, $firstName, $lastName, $phoneNumber);

//$result = $testController->deleteUserById(12);
$result = $testController->createUser($user);
//$result = $testController->updateUserById($user);
print_r($result);




