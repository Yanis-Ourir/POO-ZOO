<?php

namespace Enclosures;

use Animals\Animal;
use Interfaces\InterfaceAnimal;
use Interfaces\InterfaceEnclosure;

abstract class AbstractEnclosure implements InterfaceEnclosure
{
    protected int $id;

    protected string $name;
    protected string $type;
    protected int $maxAnimals = 6;
    protected string $cleanliness;
    protected int $animalsCount = 0;

    protected array $animals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function addAnimal(InterfaceAnimal $animal): void;

    public function removeAnimal(InterfaceAnimal $animal): void
    {
        foreach ($this->animals as $key => $value) {
            if ($value === $animal) {
                unset($this->animals[$key]);
                $this->animalsCount--;
                echo $animal->getSpecies() . " removed from enclosure" . PHP_EOL;
            }
        }
    }

    public function cleanEnclosure(): void
    {
        $this->cleanliness = "clean";
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getAnimalsCount(): int
    {
        return $this->animalsCount;
    }

    public function getAnimals(): array
    {
        return $this->animals;
    }

    /**
     * @throws \Exception
     */
    public function setCleanliness(string $cleanliness): void
    {
        if($cleanliness !== "clean" && $cleanliness !== "dirty")  {
            throw new \Exception("Cleanliness must be clean or dirty");
        }
        $this->cleanliness = $cleanliness;
    }

    public function getCleanliness(): string
    {
        return $this->cleanliness;
    }

    public function printAnimals(): void
    {
        foreach ($this->animals as $animal) {
            echo $animal->getSpecies() . PHP_EOL;
        }
    }

    public function getData(): array
    {
        return [
            "name" => $this->name,
            "maxAnimals" => $this->maxAnimals,
            "cleanliness" => $this->cleanliness,
            "animalsCount" => $this->animalsCount,
            "animals" => $this->animals,
        ];
    }
}