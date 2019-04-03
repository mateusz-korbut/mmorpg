<?php

namespace entities\Users;

include_once "Entities/Entity.php";
include_once "Entities/Users/Role.php";
include_once "Entities/Users/Status.php";

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
    public $status = Status::Inactive;
}