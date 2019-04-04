<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$characters = array();

if (isset($_SESSION["user"])) {
    $query = sprintf("SELECT
                                characters.id,
                                characters.name,
                                characters.level,
                                characters.health_points,
                                characters.coins
                            FROM users_characters
                            JOIN characters
                            ON character_id = characters.id
                            JOIN race
                            ON race_id = race.id
                            WHERE user_id = %d;", json_decode($_SESSION["user"])->id);

    $result = $connection->query($query);

    if ($result) {
        while($row = $result->fetch_object()){
            array_push($characters, $row);
        }
    }
    else {
        die($connection->error);
    }

    return $characters;
} else {
    die("Unable to download data. User not logged in!");
}