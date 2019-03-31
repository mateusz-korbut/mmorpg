<?php

namespace entities\Users;

include "Entities/Entity.php";

use entities\Entity;

class User extends Entity
{
    private $roleId;
    private $statusId;
    private $password;
    private $characters;
    private $created;
    private $role;
    private $status;

    public function getRoleId(): int
    {
        return (int) $this->roleId;
    }

    public function setRoleId(int $roleId): self
    {
        $this->roleId = $roleId;
        return $this;
    }

    public function getStatusId(): int
    {
        return (int) $this->roleId;
    }

    public function setStatusId(int $statusId): self
    {
        $this->statusId = $statusId;
        return $this;
    }

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): self
    {
        $this->characters = $characters;
        return $this;
    }

    public function getCreated(): int
    {
        return (int) $this->created;
    }

    public function getRole(): int
    {
        return (int) $this->role;
    }

    public function getStatus(): int
    {
        return (int) $this->status;
    }

}