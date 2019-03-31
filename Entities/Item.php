<?php

namespace entities;

include "Entities/Entity.php";

class Item extends Entity
{
    private $strengthBonus;
    private $agilityBonus;
    private $intelligenceBonus;

    public function getStrengthBonus(): int
    {
        return (int) $this->strengthBonus;
    }

    public function setStrengthBonus(int $strengthBonus): self
    {
        $this->strengthBonus = $strengthBonus;
        return $this;
    }

    public function getAgilityBonus(): int
    {
        return (int) $this->agilityBonus;
    }

    public function setAgilityBonus(int $agilityBonus): self
    {
        $this->agilityBonus = $agilityBonus;
        return $this;
    }

    public function getIntelligenceBonus(): int
    {
        return (int) $this->intelligenceBonus;
    }

    public function setIntelligenceBonus(int $intelligenceBonus): self
    {
        $this->intelligenceBonus = $intelligenceBonus;
        return $this;
    }
}