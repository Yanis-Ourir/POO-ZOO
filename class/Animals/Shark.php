<?php

namespace Animals;

class Shark extends WaterAnimal
{
    public function __construct(string $species)
    {
        $this->species = $species;
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is swimming";
    }

}