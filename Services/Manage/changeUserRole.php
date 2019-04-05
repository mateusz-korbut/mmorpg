<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Entities/Users/User.php";
require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

use entities\Users\User;

session_start();

$isSu = include_once dirname(__FILE__) . "/../Auth/isSu.php";

if ($isSu && isset($_POST["roleId"]) && isset($_POST["userId"]))
{
    $user= new User();
    $user->id = mysqli_real_escape_string($connection, $_POST["userId"]);
    $user->roleId = mysqli_real_escape_string($connection, $_POST["roleId"]);

    $query = sprintf("UPDATE %s SET role_id = '%s' WHERE id = %d;",
        User::TABLE_NAME, $user->roleId, $user->id);

    if (mysqli_query($connection, $query))
    {
        http_response_code(200);
    }
    else
    {
        echo json_encode(array(
            "error" => mysqli_error($connection),
            "query" => $query));
    }
}
else
{
    echo json_encode(array("error" => "You must be a super user!"));
}

$connection->close();