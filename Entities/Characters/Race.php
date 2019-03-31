<?php

namespace entities\Characters;

include "Entities/Entity.php";

use entities\Entity;

class Race extends Entity
{
    private $strength;
    private $agility;
    private $intelligence;

    public function getStrength(): int
    {
        return (int) $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;
        return $this;
    }

    public function getAgility(): int
    {
        return (int) $this->agility;
    }

    public function setAgility(int $agility): self
    {
        $this->agility = $agility;
        return $this;
    }

    public function getIntelligence(): int
    {
        return (int) $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;
        return $this;
    }
}