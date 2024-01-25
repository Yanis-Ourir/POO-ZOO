<?php

namespace Animals;

class Fish extends WaterAnimal
{
        protected string $image = "fish.gif";

        #[\Override] public function movement(): void
        {
            echo $this->species . " is swimming";
        }
}