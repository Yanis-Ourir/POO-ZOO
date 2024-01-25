<?php

namespace Animals;

class Tiger extends GroundAnimal
{
    protected string $image = "tiger.gif";

    #[\Override] public function movement(): void
    {
        echo $this->species . " is roaming";
    }
}