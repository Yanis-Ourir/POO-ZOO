<?php

namespace Animals;

use Interfaces\InterfaceAnimal;

abstract class Animal implements InterfaceAnimal
{
    protected int $weight;
    protected int $height;
    protected int $age;
    protected string $species;
    protected int $idEnclosure;
    protected bool $isSleeping;
    protected bool $isHungry;
    protected bool $isSick;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data) : void
    {
        foreach ($data as $key => $value) {
            if(isset($value)) {
                $method = 'set' . ucfirst($key);

                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }

        }
    }


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

    public function getImage() : string
    {
        return $this->image;
    }

    public function setIdEnclosure(int $idEnclosure) : void
    {
        $this->idEnclosure = $idEnclosure;
    }

    public function getIdEnclosure() : string
    {
        return $this->idEnclosure;
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

    public function setSleep(bool $isSleeping) : void
    {
        $this->isSleeping = $isSleeping;
    }

    public function getSleep() : bool
    {
        return $this->isSleeping;
    }

    public function setHungry(bool $isHungry) : void
    {
        $this->isHungry = $isHungry;
    }

    public function getHungry() : bool
    {
        return $this->isHungry;
    }

    public function setSick(bool $isSick) : void
    {
        $this->isSick = $isSick;
    }

    public function getSick() : bool
    {
        return $this->isSick;
    }

    abstract public function sound() : void;

    abstract public function movement() : void;

}