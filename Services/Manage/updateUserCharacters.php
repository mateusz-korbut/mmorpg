<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Entities/Characters/Character.php";
require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

use entities\Characters\Character;

session_start();

$isSu = include_once dirname(__FILE__) . "/../Auth/isSu.php";

function generateQuery($charForUpdate, $connection)
{
    $character= new Character();
    $character->id = mysqli_real_escape_string($connection, $charForUpdate["id"]);
    $character->level = mysqli_real_escape_string($connection, $charForUpdate["level"]);
    $character->healthPoints = mysqli_real_escape_string($connection, $charForUpdate["health_points"]);
    $character->coins = mysqli_real_escape_string($connection, $charForUpdate["coins"]);

    return sprintf("UPDATE %s SET
                                level = '%d',
                                health_points = '%d',
                                coins = '%d'
                            WHERE characters.id = %d;",
        Character::TABLE_NAME,
        $character->level,
        $character->healthPoints,
        $character->coins,
        $character->id);
}

if ($isSu && isset($_POST["characters"]))
{
    try {
        $connection->begin_transaction();

        foreach ($_POST["characters"] as $charForUpdate)
        {
            $connection->query(generateQuery($charForUpdate, $connection));
        }

        $connection->commit();
        http_response_code(200);
    } catch (Exception $e) {
        $connection->rollback();
        echo json_encode(array(
            "error" => mysqli_error($connection),
            "query" => $query));
    }
}
else
{
    echo json_encode(array("error" => "Unable to edit character. Wrong data!"));
}

$connection->close();