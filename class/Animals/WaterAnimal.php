<?php

namespace Animals;


abstract class WaterAnimal extends Animal
{
    public function sound(): void
    {
        echo $this->species . " is making a sound <br>";
    }

    public function movement() : void
    {
        echo $this->species . " is swimming <br>";
    }

}