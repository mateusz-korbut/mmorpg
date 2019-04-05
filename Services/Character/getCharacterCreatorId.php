<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$query = sprintf("SELECT creator_id AS id
                        FROM characters
                        WHERE characters.id = %d;", $_POST["id"]);

$result = $connection->query($query);

return $result->fetch_object()->id;
