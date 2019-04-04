<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Entities/Characters/Character.php";
require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

use entities\Characters\Character;

session_start();

if (isset($_POST["name"]) && isset($_POST["raceId"]) && isset($_SESSION["user"]))
{
    $character= new Character();
    $character->raceId = mysqli_real_escape_string($connection, $_POST["raceId"]);
    $character->name = mysqli_real_escape_string($connection, $_POST["name"]);

    $query = sprintf("INSERT INTO %s (race_id, creator_id, name) VALUES (%d, %d, '%s')",
        Character::TABLE_NAME, $character->raceId, json_decode($_SESSION["user"])->id, $character->name);

    if (mysqli_query($connection, $query))
    {
        $character->id = mysqli_insert_id($connection);

        $result = $connection->query(sprintf("SELECT * FROM %s WHERE id = %d",
            Character::TABLE_NAME, $character->id));

        http_response_code(201);
        echo json_encode($result->fetch_assoc());
    }
    else
    {
        echo json_encode(array(
            "error" => mysqli_error($connection),
            "query" => $query));
    }
}
else
{
    echo json_encode(array("error" => "Unable to create character. Wrong data!"));
}

$connection->close();