<?php

namespace Animals;

class Tiger extends GroundAnimal
{
    protected string $image = "tiger.gif";
    public function __construct(string $species)
    {
        $this->species = $species;
    }

    #[\Override] public function movement(): void
    {
        echo $this->species . " is roaming";
    }
}