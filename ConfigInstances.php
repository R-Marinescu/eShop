<?php

use Controllers\UserController;
use DatabaseConfig\DatabaseConfig;
use DatabaseConfig\DriverPDO;
use Repositories\UserRepo;
use Pimple\Container;
use Logs\Logs;

require 'vendor/autoload.php';

$container = new Container();

$container['DriverPDO'] = $container->factory(function () {
    $db = new DriverPDO();
    $db->setConnectionConfig(DatabaseConfig::PARAMS['local']);
    $db->initialize();
    return $db;
});

$container['Logs'] = function ($c) {
    return new Logs($c['DriverPDO']);
};

$container['UserRepo'] = function ($c) {
    return new UserRepo($c['DriverPDO'], $c['Logs']);
};

$container['UserController'] = function ($c) {
    return new UserController($c['UserRepo'], $c['Logs']);
};

return $container;