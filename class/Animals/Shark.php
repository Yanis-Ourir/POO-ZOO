<?php

namespace Animals;

class Shark extends WaterAnimal
{
    protected string $image = "shark.gif";


    #[\Override] public function movement(): void
    {
        echo $this->species . " is swimming";
    }

}