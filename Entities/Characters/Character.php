<?php

namespace entities\Characters;

include "Entities/Entity.php";

use entities\Entity;

class Character extends Entity
{
    const TABLE_NAME = "characters";

    public $raceId;
    public $level;
    public $healthPoints;
    public $coins;
    public $created;
    public $race;
    public $inventory;

    public function serializeToJSON(): string
    {
        return json_encode(array(
            "id" => $this->id,
            "name" => $this->name,
            "raceId" => $this->raceId,
            "level" => $this->level,
            "healthPoints" => $this->healthPoints,
            "coins" => $this->coins,
            "created" => $this->created,
            "race" => $this->created,
            "inventory" => $this->created,
        ));
    }
}