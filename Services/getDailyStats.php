<?php

require_once dirname(__FILE__) . "/../Utils/databaseConnection.php";

http_response_code(400);

if (isset($_POST["name"]))
{
    $query = "SELECT * FROM daily_stats";

    $result = $connection->query($query);

    if ($result)
    {
        http_response_code(200);

        $json = array();

        while($row = $result->fetch_object()){
            $json[] = $row;
        }

        echo json_encode($json);
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
