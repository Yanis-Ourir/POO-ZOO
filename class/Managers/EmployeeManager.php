<?php

namespace Managers;

use Interfaces\InterfaceManager;
use Interfaces\InterfaceStaff;
use Staffs\Employee;

class EmployeeManager implements InterfaceManager
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
     * @return void
     */
    #[\Override] public function create(object $object): void
    {
        $query = $this->db->prepare('INSERT INTO staff (name, age, gender) VALUES (:name, :age, :gender)');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':gender', $object->getGender());
        $query->execute();
    }

    /**
     * @return void
     */
    #[\Override] public function read(): void
    {
        $query = $this->db->prepare('SELECT * FROM staff');
        $query->execute();
        $data = $query->fetchAll();
        foreach($data as $employee) {
            echo $employee['name'] . "<br>";
        }
    }

    /**
     * @return void
     */
    #[\Override] public function update(int $id, object $object): void
    {
        $query = $this->db->prepare('UPDATE staff SET name = :name, age = :age, gender = :gender WHERE id = :id');
        $query->bindValue(':name', $object->getName());
        $query->bindValue(':age', $object->getAge());
        $query->bindValue(':gender', $object->getGender());
        $query->bindValue(':id', $id);
        $query->execute();
    }

    /**
     * @return void
     */
    #[\Override] public function delete(int $id): void
    {
        $query = $this->db->prepare('DELETE FROM staff WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }
}