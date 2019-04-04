<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Entities/Characters/Character.php";
require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

use entities\Characters\Character;

session_start();

if (isset($_POST["name"]) && isset($_POST["id"]) && isset($_SESSION["user"]))
{
    $isSu = include_once "Services/Auth/isSu.php";
    $charCreator = include_once dirname(__FILE__) . "/../Character/getCharacterCreatorId.php";

    if ($charCreator == json_decode($_SESSION["user"])->id || $isSu) {
        $character= new Character();
        $character->id = mysqli_real_escape_string($connection, $_POST["id"]);
        $character->name = mysqli_real_escape_string($connection, $_POST["name"]);

        $query = sprintf("UPDATE %s SET name = '%s' WHERE characters.id = %d;",
            Character::TABLE_NAME, $character->name, $character->id);

        if (mysqli_query($connection, $query))
        {
            http_response_code(200);
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
        echo json_encode(array("error" => "Must be creator or super user!"));
    }
}
else
{
    echo json_encode(array("error" => "Unable to edit character. Wrong data!"));
}

$connection->close();