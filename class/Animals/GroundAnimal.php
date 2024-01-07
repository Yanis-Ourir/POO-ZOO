<?php

namespace Animals;

abstract class GroundAnimal extends Animal
{

    #[\Override] public function sound(): void
    {
        echo $this->species . " is making a sound <br>";
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is roaming around <br>";
    }
}