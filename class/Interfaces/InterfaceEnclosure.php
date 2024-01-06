<?php

namespace Interfaces;

interface InterfaceEnclosure
{
    public function addAnimal(InterfaceAnimal $animal) : void;

    public function removeAnimal(InterfaceAnimal $animal) : void;

    public function getAnimals() : array;

    public function cleanEnclosure() : void;
}