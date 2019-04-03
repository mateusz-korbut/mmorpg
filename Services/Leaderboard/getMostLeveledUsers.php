<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$query="SELECT
            users.id AS userId,
            users.name AS userName,
            SUM(level) AS gainedLevels
        FROM users
        JOIN users_characters
        ON users.id = users_characters.user_id
        JOIN characters
        ON characters.id = users_characters.character_id
        GROUP BY userId
        ORDER BY gainedLevels DESC
        LIMIT 10;";

$result = $connection->query($query);

$connection->close();

return $result;
