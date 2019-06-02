<?php

require_once dirname(__FILE__) . "/../../Entities/Users/Role.php";

use entities\Users\Role;

if (isset($_SESSION["user"]))
{
    $userRole = json_decode($_SESSION["user"])->role_id;

    return $userRole == Role::Admin || $userRole == Role::Moderator;
}

return false;
