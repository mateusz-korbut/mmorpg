<?php

http_response_code(400);

$rootFolder = dirname(__FILE__) . "/../../";

require_once $rootFolder .  "Entities/Users/User.php";
require_once $rootFolder . "Utils/databaseConnection.php";

use entities\Users\User;

if (isset($_POST["name"]) && isset($_POST["password"]))
{
    $query = sprintf("SELECT * FROM %s WHERE name LIKE '%s'", User::TABLE_NAME, $_POST["name"]);
    $result = $connection->query($query);

    if ($result->num_rows == 1)
    {
        $user = $result->fetch_assoc();
        if (password_verify($_POST["password"], $user["password"]))
        {
            $query = "SELECT * FROM daily_stats WHERE DATE_FORMAT(data, '%y-%m-%d') = DATE_FORMAT(NOW(), '%y-%m-%d');";
            $result = $connection->query($query);

            if ($result->num_rows != 0)
            {
                $stats = $result->fetch_object();
                $stats->logged_in += 1;

                $query = sprintf("UPDATE daily_stats SET logged_in = '%s' WHERE id = %d;",
                    $stats->logged_in, $stats->id);
            }
            else
            {
                $query = "INSERT INTO daily_stats (logged_in, data) VALUES ('1', NOW())";
                $connection->query($query);
            }
            http_response_code(200);

            session_start();
            unset($user["password"]);
            $userSerialized = json_encode($user);
            $_SESSION["user"] = $userSerialized;
            echo json_encode(array("message" => "User logged in."));
        }
        else
        {
            unableToLogin();
        }
    }
    else
    {
        unableToLogin();
    }
}
else
{
    unableToLogin();
}

function unableToLogin()
{
    echo json_encode(array("error" => "Unable to login. Wrong data!"));

}

$connection->close();
