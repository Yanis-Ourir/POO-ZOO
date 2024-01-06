<?php

namespace Staffs;


use Interfaces\InterfaceAnimal;
use Interfaces\InterfaceEnclosure;

class Employee
{
    protected string $name;
    protected int $age;
    protected string $gender;

    public function __construct($name) {
        $this->name = $name;
    }

    public function examineEnclosure(InterfaceEnclosure $enclosure): void {
        foreach($enclosure->getData() as $animal) {
            echo $animal;
        }
    }

    /**
     * @throws \Exception
     */
    public function cleanEnclosure(InterfaceEnclosure $enclosure): void {
        if($enclosure->getAnimalsCount() === 0) {
            echo "This enclosure is empty, no need to clean it" . PHP_EOL;
            $enclosure->cleanEnclosure();
        } else {
            throw new \Exception("This enclosure is not empty, you can't clean it");
        }

    }

    public function feedAnimals(InterfaceEnclosure $enclosure): void {
        foreach($enclosure->getAnimals() as $animal) {
            if($animal->wakeUp() === false) {
                echo "This animal is sleeping, you can't feed it" . PHP_EOL;
            }
            echo $this->name . " gave food to " .  $animal->getSpecies . $animal->eat();
        }
    }

    public function addAnimalToEnclosure(InterfaceEnclosure $enclosure, InterfaceAnimal $animal): void 
    {
        $enclosure->addAnimal($animal);
    }
    
    public function removeAnimalFromEnclosure(InterfaceEnclosure $enclosure, InterfaceAnimal $animal): void 
    {
        $enclosure->removeAnimal($animal);
    }
    
    public function transferAnimal(InterfaceEnclosure $enclosureWhereRemoving, InterfaceEnclosure $enclosureWhereAdding, InterfaceAnimal $animal): void 
    {
        $enclosureWhereRemoving->removeAnimal($animal);
        $enclosureWhereAdding->addAnimal($animal);
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setGender(string $gender) : void
    {
        $this->gender = $gender;
    }

    public function getGender() : string
    {
        return $this->gender;
    }

}