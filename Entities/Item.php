<?php

namespace entities;

require_once dirname(__FILE__) .  "Entity.php";

class Item extends Entity
{
    public $strengthBonus;
    public $agilityBonus;
    public $intelligenceBonus;
}