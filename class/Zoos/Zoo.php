<?php

namespace Zoos;

use Staffs\Employee;

class Zoo
{
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

    public function main() : void
    {
        $i = 0;
        while($i <= $this->animalsCount) {
            // TODO : Faire en sorte que ce soit RANDOMISER
            foreach($this->enclosures as $enclosure) {
                $enclosure->getAnimals()[$i]->wakeUp();
                $enclosure->getAnimals()[$i]->eat();
                $enclosure->getAnimals()[$i]->goToSleep();
            }
            $i++;
        }

        foreach($this->enclosures as $enclosure) {
            $enclosure->setCleanliness(rand('clean', 'dirty'));
        }

        // Passer la main à l'employé pour qu'il puisse faire son travail
    }
}