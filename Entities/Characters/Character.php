<?php

namespace entities\Characters;

include "Entities/Entity.php";

use entities\Entity;

class Character extends Entity
{
    public $raceId;
    public $inventoryId;
    public $level;
    public $healthPoints;
    public $coins;
    public $created;
    public $race;
    public $inventory;
}