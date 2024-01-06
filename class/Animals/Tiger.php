<?php

namespace Animals;

class Tiger extends GroundAnimal
{
    public function __construct(string $species)
    {
        $this->species = $species;
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is roaming";
    }
}