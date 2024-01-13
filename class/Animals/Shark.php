<?php

namespace Animals;

class Shark extends WaterAnimal
{
    protected string $image = "shark.gif";
    public function __construct(string $species)
    {
        $this->species = $species;
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is swimming";
    }

}