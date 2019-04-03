<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$query="SELECT
            users.id AS userId,
            users.name AS userName,
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

$connection->close();

return $result;
