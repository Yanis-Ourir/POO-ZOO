<?php

namespace Managers;

use Interfaces\InterfaceManager;

class ZooManager implements InterfaceManager
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
        $query = $this->db->prepare('INSERT INTO zoo (name, id_staff) VALUES  (:name, :id_staff)');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':id_staff', $_SESSION['id_staff']);
        $query->execute();
    }

    /**
     * @return void
     */
    #[\Override] public function read(): void
    {
        $query = $this->db->prepare('SELECT * FROM zoo');
        $query->execute();
        $data = $query->fetchAll();
        foreach($data as $zoo) {
            echo $zoo['animals_count'] . "<br>";
        }
    }

    /**
     * @param int $id
     * @param object $object
     * @return void
     */
    #[\Override] public function update(object $object): void
    {
        $query = $this->db->prepare('UPDATE zoo SET name = :name, animals_count = :animals_count WHERE id = :id');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':animals_count', $object->getAnimalsCount());
        $query->bindValue(':id', $object->getId());
        $query->execute();
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override] public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM zoo WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }

    public function findById(int $id) : array
    {
        $query = $this->db->prepare('SELECT * FROM zoo WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function getZooId(string $zooName): int
    {
        $query = $this->db->prepare('SELECT id FROM zoo WHERE name = :name');
        $query->bindValue(':name', $zooName);
        $query->execute();
        $data = $query->fetch();
        return $data['id'];
    }

    public function enclosureZoo(int $id): array
    {
        $query = $this->db->prepare('SELECT * FROM zoo JOIN enclosure ON enclosure.id_zoo = zoo.id WHERE id_zoo = :id_zoo');
        $query->bindValue(':id_zoo', $id);
        $query->execute();
        return $query->fetchAll();
    }
}