<?php

http_response_code(400);

include "Entities/Users/User.php";
include "Utils/databaseConnection.php";

use entities\Users\User;

if (isset($_POST["name"]) && isset($_POST["password"]))
{
    $user = new User($_POST["name"], $_POST["password"]);
    $user->roleId = 1;
    $user->statusId = 2;

    $query = sprintf("INSERT INTO %s (role_id, status_id, name, password) VALUES
        (%d, %d, '%s', '%s')", User::TABLE_NAME, $user->roleId, $user->statusId, $user->name, $user->password);

    if (mysqli_query($connection, $query)) {
        http_response_code(201);
        session_start();
        $userSerialized = json_encode(array(
            "id" => mysqli_insert_id($connection),
            "roleId" => $user->roleId,
            "statusId" => $user->statusId,
            "name" => $user->name,
            "created" => $user->created
        ));

        $_SESSION["user"] = $userSerialized;
        echo json_encode(array("message" => "User created."));
    } else {
        echo json_encode(array(
            "error" => mysqli_error($connection),
            "query" => $query));
    }
}
else
{
    echo json_encode(array("error" => "Unable to create user. Wrong data!"));
}

$connection->close();