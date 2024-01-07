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
        $query = $this->db->prepare('INSERT INTO animal (weight, height, age, species, id_enclosure) VALUES (:weight, :height, :age, :species, :id_enclosure)');
        $query->bindValue(':weight', $object->getWeight());
        $query->bindValue(':height', $object->getHeight());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':species', $object->getSpecies());
        $query->bindValue(':id_enclosure', $_SESSION['id_enclosure']);
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
    #[\Override] public function update(int $id, object $object): void
    {
        $query = $this->db->prepare('UPDATE animal SET weight = :weight, height = :height, age = :age, species = :species WHERE id = :id');
        $query->bindValue(':weight', $object->getWeight());
        $query->bindValue(':height', $object->getHeight());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':species', $object->getSpecies());
        $query->bindValue(':id', $id);
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
}