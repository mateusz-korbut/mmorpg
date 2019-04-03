<?php

require_once dirname(__FILE__) . "/../../Services/Manage/getUsers.php";

if ($result)
{
    $user = $result->fetch_object();

    echo json_encode($user);
}
else
{
    echo "Problem with database";
}