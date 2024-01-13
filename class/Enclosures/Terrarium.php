<?php

namespace Enclosures;

use Animals\Animal;
use Animals\GroundAnimal;
use Interfaces\InterfaceAnimal;

class Terrarium extends AbstractEnclosure
{

    /**
     * @param Animal $animal
     * @return void
     * @throws \Exception
     */
    #[\Override] public function addAnimal(InterfaceAnimal $animal): void
    {
        if($this->animalsCount >= $this->maxAnimals) {
            throw new \Exception("This enclosure is full, remove an animal first if you want to add a new one");
        }

        if($animal instanceof GroundAnimal) {
            $this->animals[] = $animal;
            $this->animalsCount++;
        } else {
            throw new \Exception("This animal is not a Ground animal");
        }
    }
}