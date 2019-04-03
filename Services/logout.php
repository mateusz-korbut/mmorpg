<?php

session_start();

if (isset($_SESSION["user"]))
{
    http_response_code(200);

    unset($_SESSION["user"]);
    echo json_encode(array("message" => "Logout successful."));
}
else
{
    http_response_code(400);
    echo json_encode(array("error" => "There's no logged user."));
}