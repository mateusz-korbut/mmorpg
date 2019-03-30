<?php

namespace entities;

use http\Exception\InvalidArgumentException;

abstract class Entity
{
    private $id;
    private $name;

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function getName(): string
    {
        return (string) $this->name;
    }

    public function setName(string $name): self
    {
        if (strlen($name) > 25)
        {
            throw new InvalidArgumentException("Size cannot be greater than 25");
        }
        $this->$name = $name;
        return $this;
    }

}