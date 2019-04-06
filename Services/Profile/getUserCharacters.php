<?php

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

$characters = array();

if (isset($_GET["id"]))
{
    $id = $_GET["id"];
}
else if (isset($_SESSION["user"]))
{
    $id = json_decode($_SESSION["user"])->id;
}
else
{
    die("You must be logged in or set user id!");
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
