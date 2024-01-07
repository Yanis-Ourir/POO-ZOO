<?php

namespace Managers;

use Interfaces\InterfaceManager;

class EnclosureManager implements InterfaceManager
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
        $query = $this->db->prepare('INSERT INTO enclosure (name, cleanliness, animals_count, id_zoo) VALUES (:name, :cleanliness, :animals_count, :id_zoo)');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':cleanliness', $object->getCleanliness());
        $query->bindValue(':animals_count', $object->getAnimalsCount());
        $query->bindValue(':id_zoo', $_SESSION['id_zoo']);
        $query->execute();
    }

    /**
     * @return void
     */
    #[\Override] public function read(): void
    {
        $query = $this->db->prepare('SELECT * FROM enclosure');
        $query->execute();
        $data = $query->fetchAll();
        foreach($data as $enclosure) {
            echo $enclosure['name'] . "<br>";
        }
    }

    /**
     * @param int $id
     * @param object $object
     * @return void
     */
    #[\Override] public function update(int $id, object $object): void
    {
        $query = $this->db->prepare('UPDATE enclosure SET name = :name, cleanliness = :cleanliness, animals_count = :animals_count WHERE id = :id');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':cleanliness', $object->getCleanliness());
        $query->bindValue(':animals_count', $object->getAnimalsCount());
        $query->bindValue(':id', $id);
        $query->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override] public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM enclosure WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }
}