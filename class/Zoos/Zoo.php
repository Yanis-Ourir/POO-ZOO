<?php

namespace Zoos;

use Interfaces\InterfaceEnclosure;
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
//        $i = 0;
//        while($i <= $this->animalsCount) {
//            // TODO : Faire en sorte que ce soit RANDOMISER
//            foreach($this->enclosures as $enclosure) {
//                $enclosure->getAnimals()[$i]->wakeUp();
//                $enclosure->getAnimals()[$i]->eat();
//                $enclosure->getAnimals()[$i]->goToSleep();
//            }
//            $i++;
//        }

        if($this->enclosures === []) {
            echo "There is no enclosure in this zoo" . PHP_EOL;
            return;
        }

        foreach($this->enclosures as $enclosure) {
            $enclosure->setCleanliness(rand('clean', 'dirty'));
        }

        // Passer la main à l'employé pour qu'il puisse faire son travail
    }
}