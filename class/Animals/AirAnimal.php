<?php

namespace Animals;

abstract class AirAnimal extends Animal
{
    #[\Override] public function sound(): void
    {
        echo $this->species . " is making a sound <br>";
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is flying <br>";
    }
}