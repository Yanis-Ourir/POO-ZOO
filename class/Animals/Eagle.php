<?php

namespace Animals;

class Eagle extends AirAnimal
{

    public function __construct(string $species)
    {
        $this->species = $species;
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is flying";
    }
}