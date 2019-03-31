<?php

$config = include("Configs/databaseConfig.php");

$connection = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);

if ($connection->connect_error) {
    $_SESSION["error"] = $connection->connect_error;
    header("Location: "."error.php");
    die();
}

return $connection;
