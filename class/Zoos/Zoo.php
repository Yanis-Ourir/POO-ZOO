<?php

namespace Zoos;

use Interfaces\InterfaceEnclosure;
use Staffs\Employee;

class Zoo
{

    protected int $id;

    protected string $name;

    protected Employee $employee;

    protected int $maxEnclosures = 10;

    protected array $enclosures = [];

    protected int $animalsCount = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAnimalsCount(): int
    {
        foreach($this->enclosures as $enclosure) {
            $this->animalsCount += $enclosure->getAnimalsCount();
        }
        return $this->animalsCount;
    }

    /**
     * @throws \Exception
     */
    public function addEnclosure(InterfaceEnclosure $enclosure): void
    {
        if(count($this->enclosures) >= $this->maxEnclosures) {
            throw new \Exception("This zoo is full, remove an enclosure first if you want to add a new one");
        }
        $this->enclosures[] = $enclosure;
    }

    public function getEnclosures(): array
    {
        return $this->enclosures;
    }

    public function main() : void
    {
        if ($this->enclosures === []) {
            echo "There is no enclosure in this zoo" . PHP_EOL;
            return;
        }

        foreach ($this->enclosures as $enclosure) {
            $enclosure->setCleanliness(rand('clean', 'dirty'));
            foreach ($enclosure->getAnimals() as $animal) {
                $animal->setHungry(rand(0, 1));
                $animal->setSleep(rand(0, 1));
                $animal->setSick(rand(0, 1));
            }
        }

    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }


}