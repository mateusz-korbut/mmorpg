<?php

namespace entities\Characters;

include "Entities/Entity.php";

use entities\Entity;

class Character extends Entity
{
    private $raceId;
    private $inventoryId;
    private $level;
    private $healthPoints;
    private $coins;
    private $created;
    private $race;
    private $inventory;

    public function getRaceId(): int
    {
        return (int) $this->raceId;
    }

    public function setRaceId(int $raceId): self
    {
        $this->raceId = $raceId;
        return $this;
    }

    public function getInventoryId(): int
    {
        return (int) $this->inventoryId;
    }

    public function setInventoryId(int $inventoryId): self
    {
        $this->inventoryId = $inventoryId;
        return $this;
    }

    public function getLevel(): int
    {
        return (int) $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function getHealthPoints(): int
    {
        return (int) $this->healthPoints;
    }

    public function setHealthPoints(int $healthPoints): self
    {
        $this->healthPoints = $healthPoints;
        return $this;
    }

    public function getCoins(): int
    {
        return (int) $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;
        return $this;
    }

    public function getCreated(): int
    {
        return (int) $this->created;
    }

    public function getRace(): array
    {
        return $this->race;
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

}