<?php

namespace entities\Users;

require_once dirname(__FILE__) . "/../Entity.php";

use entities\Entity;

class Status extends Entity
{
    const TABLE_NAME = "statuses";

    const Inactive = 1;
    const Active = 2;
    const Blocked = 3;

}