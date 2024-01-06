<?php

namespace Staffs;

use Enclosures\AbstractEnclosure;

class Employee
{
    protected string $name;
    protected int $age;
    protected string $gender;

    public function __construct($name) {
        $this->name = $name;
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

    public function examineEnclosure(AbstractEnclosure $enclosure): void {
        echo "The enclosure " . $enclosure->getName() . " has " . $enclosure->getAnimalsCount() . " animals" . PHP_EOL;
    }
}