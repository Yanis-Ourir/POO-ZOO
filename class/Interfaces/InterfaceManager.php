<?php

namespace Interfaces;

interface InterfaceManager
{
    public function create(object $object) : void;
    public function read() : void;
    public function update(int $id, object $object) : void;
    public function delete(int $id) : void;

}