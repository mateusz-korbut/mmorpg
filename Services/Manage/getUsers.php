<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$users = array();

if (isset($_SESSION["user"])) {

    $isSu = include_once "Services/Auth/isSu.php";

    if ($isSu)
    {
        $query = "SELECT
                    users.id,
                    users.name,
                    users.created,
                    users.role_id AS roleId,
                    roles.name AS roleName,
                    users.status_id AS statusId,
                    statuses.name AS statusName
                FROM users
                JOIN roles
                ON users.role_id = roles.id
                JOIN statuses
                ON users.status_id = statuses.id;";

        $result = $connection->query($query);

        if ($result) {

            while ($row = $result->fetch_object()) {
                array_push($users, $row);
            }
        } else {
            die($connection->error);
        }

        return $users;
    }
    else
    {
        die("Unable to download data. You must be a super user!");
    }
}
die("Unable to download data. You're not logged in!");
