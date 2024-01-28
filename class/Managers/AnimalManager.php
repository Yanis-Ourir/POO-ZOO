<?php

namespace Managers;

use Interfaces\InterfaceManager;

class AnimalManager implements InterfaceManager
{
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }
    /**
     * @param object $object
     * @return void
     */
    #[\Override] public function create(object $object): void
    {
        $query = $this->db->prepare('INSERT INTO animal (weight, height, age, species, image, id_enclosure) VALUES (:weight, :height, :age, :species, :image, :id_enclosure)');
        $query->bindValue(':weight', $object->getWeight());
        $query->bindValue(':height', $object->getHeight());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':species', $object->getSpecies());
        $query->bindValue(':image', $object->getImage());
        $query->bindValue(':id_enclosure', $object->getIdEnclosure());
        $query->execute();
    }

    /**
     * @return void
     */
    #[\Override] public function read(): void
    {
        $query = $this->db->prepare('SELECT * FROM animal');
        $query->execute();
        $data = $query->fetchAll();
        foreach($data as $animal) {
            echo $animal['species'] . "<br>";
        }
    }

    /**
     * @param int $id
     * @param object $object
     * @return void
     */
    #[\Override] public function update(object $object): void
    {
        $query = $this->db->prepare('UPDATE animal SET weight = :weight, height = :height, age = :age, species = :species WHERE id = :id');
        $query->bindValue(':weight', $object->getWeight());
        $query->bindValue(':height', $object->getHeight());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':species', $object->getSpecies());
        $query->bindValue(':id', $object->getId());
        $query->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override] public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM animal WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }

    public function findById(int $id): array
    {
        $query = $this->db->prepare('SELECT * FROM animal WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch();
    }
}