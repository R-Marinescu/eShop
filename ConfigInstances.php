<?php

use Controllers\UserController;
use DatabaseConfig\DatabaseConfig;
use DatabaseConfig\DriverPDO;
use Repositories\UserRepo;
use Pimple\Container;

require 'vendor/autoload.php';

$container = new Pimple\Container();

$container['DriverPDO'] = $container->factory(function () {
    $db = new DriverPDO();
    $db->setConnectionConfig(DatabaseConfig::PARAMS['local']);
    $db->initialize();
    return $db;
});

$container['UserRepo'] = function($c) {
    return new UserRepo($c);
};

$container['UserController'] = function($c) {
    return new UserController($c);
};

$container['Logs'] = function($c) {
    return new Logs($c);
};

return $container;