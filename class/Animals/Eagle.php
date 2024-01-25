<?php

namespace Animals;

class Eagle extends AirAnimal
{
    protected string $image = "eagle.gif";

    #[\Override] public function movement(): void
    {
        echo $this->species . " is flying";
    }
}