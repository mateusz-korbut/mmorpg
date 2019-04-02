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
    public $role;
    public $status;

    public function __construct($name, $password)
    {
        $this->name = htmlspecialchars($name);
        $this->password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
        $this->roleId = Role::User;
        $this->statusId = Status::Inactive;
    }

}