<?php

namespace Animals;

class Bear extends GroundAnimal
{
    protected string $image = "bear.gif";

    #[\Override] public function movement(): void
    {
        echo $this->species . " is walking";
    }
}