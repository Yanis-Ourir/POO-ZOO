<?php

namespace Enclosures;

use Animals\WaterAnimal;
use Interfaces\InterfaceAnimal;

class Aquarium extends AbstractEnclosure
{
    /**
     * @throws \Exception
     */
    public function addAnimal(InterfaceAnimal $animal): void
    {
        if($this->animalsCount >= $this->maxAnimals) {
            throw new \Exception("This enclosure is full, remove an animal first if you want to add a new one");
        }

        if ($animal instanceof WaterAnimal) {
            $this->animals[] = $animal;
            $this->animalsCount++;
        } else {
            throw new \Exception("This animal is not a water animal");
        }
    }

}