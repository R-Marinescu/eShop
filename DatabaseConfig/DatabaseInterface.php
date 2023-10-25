<?php

namespace DatabaseConfig;

interface DatabaseInterface
{
    public function initialize();
    public function close();
    public function execute(string $statement);
}