<?php

http_response_code(400);

require_once dirname(__FILE__) . "/../../Utils/databaseConnection.php";

if (isset($_POST["name"]))
{
    $query = "SELECT id, name FROM users WHERE name LIKE '%" . $_POST["name"] . "%'";

    $result = $connection->query($query);

    if ($result)
    {
        http_response_code(200);

        return $result;
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
