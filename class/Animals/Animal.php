<?php

namespace Animals;

use Interfaces\InterfaceAnimal;

abstract class Animal implements InterfaceAnimal
{
    protected int $weight;
    protected int $height;
    protected int $age;
    protected string $species;

    public function setWeight(int $weight) : void
    {
        $this->weight = $weight;
    }

    public function getWeight() : int
    {
        return $this->weight;
    }

    public function setHeight(int $height) : void
    {
        $this->height = $height;
    }

    public function getHeight() : int
    {
        return $this->height;
    }

    public function setAge(int $age) : void
    {
        $this->age = $age;
    }

    public function getAge() : int
    {
        return $this->age;
    }

    public function setSpecies(string $species) : void
    {
        $this->species = $species;
    }

    public function getSpecies() : string
    {
        return $this->species;
    }

    public function data() : void
    {
        echo "Species: " . $this->species . "<br>";
        echo "Weight: " . $this->weight . "<br>";
        echo "Height: " . $this->height . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
    public function eat() : void
    {
        echo $this->species . " is eating";
    }

    public function sleep() : void
    {
        echo $this->species . " is sleeping";
    }

    public function wakeUp() : void
    {
        echo $this->species . " is waking up";
    }

    abstract public function sound() : void;

    abstract public function movement() : void;

}