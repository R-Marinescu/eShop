<?php

require 'bootstrap.php';

$testController = $container['UserController'];
$userId = 21;
$firstName = 'Stelios';
$lastName = 'Mar';
$phoneNumber = '237851';
$DOB = '2003-04-25';
//$result = $testController->updateUserById($userId, $firstName, $lastName, $phoneNumber, $DOB);
$result = $testController->saveUser($firstName, $lastName, $phoneNumber, $DOB);
//$result = $testController->deleteUserById(26);
print_r($result);
//var_dump($result);


//$testRepo = $container['UserRepo'];
//
//$firstName = 'Alex';
//$lastName = 'Jhonson';
//$phoneNumber = '0983423';
//$DOB = '2003-04-25';
//
////$result = $testRepo->insertUser($firstName, $lastName, $phoneNumber, $DOB);
//$result = $testRepo->deleteById(7);
//var_dump($result);
