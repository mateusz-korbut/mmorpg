<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$characters = array();

if (isset($_SESSION["user"])) {
    if (isset($_POST["id"]) && $isSu)
    {
        $id = $_POST["id"];
    }
    else
    {
        $id = json_decode($_SESSION["user"])->id;
    }

    $query = sprintf("SELECT
                                characters.id,
                                characters.name,
                                characters.level,
                                characters.health_points,
                                characters.coins
                            FROM characters
                            JOIN race
                            ON race_id = race.id
                            WHERE creator_id = %d;", $id);

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