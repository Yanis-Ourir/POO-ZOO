<?php

namespace Enclosures;

use Animals\AirAnimal;
use Interfaces\InterfaceAnimal;

class Aviary extends AbstractEnclosure
{


    /**
     * @param InterfaceAnimal $animal
     * @return void
     * @throws \Exception
     */
    #[\Override] public function addAnimal(InterfaceAnimal $animal): void
    {
        if($this->animalsCount >= $this->maxAnimals) {
            throw new \Exception("This enclosure is full, remove an animal first if you want to add a new one");
        }

        if ($animal instanceof AirAnimal) {
            $this->animals[] = $animal;
            $this->animalsCount++;
            echo "<p>" . $animal->getSpecies() . " added to enclosure" . "</p>";
        } else {
            throw new \Exception("This animal is not a Flying animal");
        }
    }
}