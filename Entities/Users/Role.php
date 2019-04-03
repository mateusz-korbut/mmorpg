<?php

namespace entities\Users;

include_once "Entities/Entity.php";

use entities\Entity;

class Role extends Entity
{
    const TABLE_NAME = "roles";

    const Admin = 1;
    const Moderator = 2;
    const User = 3;
}