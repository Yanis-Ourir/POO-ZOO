<?php

namespace Animals;

class Fish extends WaterAnimal
{
        protected string $image = "fish.gif";
        public function __construct(string $species)
        {
            $this->species = $species;
        }

        #[\Override] public function movement(): void
        {
            echo $this->species . " is swimming";
        }
}