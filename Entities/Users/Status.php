<?php

namespace entities\Users;

require_once dirname(__FILE__) . "/../Entity.php";

use entities\Entity;

class Status extends Entity
{
    const TABLE_NAME = "statuses";

    const Active = 1;
    const Blocked = 2;

}