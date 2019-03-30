<?php

$config = include("Configs/databaseConfig.php");

$connection = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

if ($connection->connect_error) {
    die("Database connection error: " . $connection->connect_error);
}
echo "Database connected";

$connection->close();
