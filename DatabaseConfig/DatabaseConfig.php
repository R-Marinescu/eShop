<?php

namespace DatabaseConfig;

interface DatabaseConfig
{
public const PARAMS = [
    "local" => [
        'driver' => 'mysql',
        "host" => 'localhost',
        "username" => 'root',
        "password" => '12345678',
        "database" => 'airtickets',
        "charset" => 'utf8mb4'
    ]
];

    public const USER_TABLE_NAME = "users";
//    public const host = 'localhost';
//    public const username = 'root';
//    public const password = '123456';
//    public const dbName = 'airtickets';
}