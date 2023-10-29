<?php

require 'bootstrap.php';

$testController = $container['UserController'];
$userId = 21;
$firstName = 'User';
$lastName = 'Test';
$phoneNumber = '23333323';
$DOB = '2003-04-25';
//$result = $testController->updateUserById($userId, $firstName, $lastName, $phoneNumber, $DOB);
$result = $testController->selectAllUsers();
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
