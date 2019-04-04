<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$user = json_decode($_SESSION["user"]);

$query = sprintf("SELECT
                            users.id AS userId,
                            users.name AS userName,
                            role_id AS roleId,
                            roles.name AS roleName,
                            status_id AS statusId,
                            statuses.name AS statusName,
                            created
                        FROM users
                        JOIN roles
                        ON users.role_id = roles.id
                        JOIN statuses
                        ON users.status_id = statuses.id
                        WHERE users.id = %d;", $user->id);

$result = $connection->query($query);

return $result;
