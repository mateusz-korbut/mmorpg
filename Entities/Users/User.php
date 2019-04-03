<?php

namespace entities\Users;

require_once dirname(__FILE__) . "/../Entity.php";
require_once dirname(__FILE__) . "/../Users/Role.php";
require_once dirname(__FILE__) . "/../Users/Status.php";

use entities\Entity;

class User extends Entity
{
    const TABLE_NAME = "users";

    public $roleId;
    public $statusId;
    public $password;
    public $characters;
    public $created;
    public $role = Role::User;
    public $status = Status::Active;
}