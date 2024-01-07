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
        $query = $this->db->prepare('INSERT INTO zoo (animals_count, id_staff) VALUES  (:animals_count, :id_staff)');
        $query->bindValue(':animals_count', $object->getAnimalsCount());
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
    #[\Override] public function update(int $id, object $object): void
    {
        $query = $this->db->prepare('UPDATE zoo SET animals_count = :animals_count WHERE id = :id');
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
        $query = $this->db->prepare('DELETE FROM zoo WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }
}