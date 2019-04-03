<?php

namespace entities\Users;

require_once dirname(__FILE__) . "/../Entity.php";

use entities\Entity;

class Role extends Entity
{
    const TABLE_NAME = "roles";

    const Admin = 1;
    const Moderator = 2;
    const User = 3;
}