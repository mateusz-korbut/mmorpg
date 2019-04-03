<?php

http_response_code(400);

require_once "databaseConnection.php";

if (isset($query))
{
    $result = $connection->query($query)->fetch_assoc();

    if ($result)
    {
        http_response_code(200);

        echo json_encode($result);
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
    echo json_encode(array("error" => "You must set query!"));
}

$connection->close();