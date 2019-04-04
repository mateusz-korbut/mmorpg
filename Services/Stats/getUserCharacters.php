<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

session_start();

if (isset($_SESSION["user"])) {
    $query = sprintf("SELECT
                                characters.id,
                                characters.name,
                                level,
                                health_points,
                                coins
                            FROM characters
                            JOIN race
                            ON race_id = race.id
                            WHERE creator_id = %d;", json_decode($_SESSION["user"])->id);

    $result = $connection->query($query);

    $json = array();

    while($row = $result->fetch_object()){
        $json[] = $row;
    }

    echo json_encode($json);
} else {
    echo json_encode(array("error" => "Unable to download data. User not logged in!"));
}
