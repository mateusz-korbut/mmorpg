<?php

namespace entities\Characters;

include "Entities/Entity.php";

use entities\Entity;

class Race extends Entity
{
    const TABLE_NAME = "race";

    const Human = 1;
    const Elf = 2;
    const Dwarf = 3;
    const Orc = 4;

    public $strength;
    public $agility;
    public $intelligence;
}