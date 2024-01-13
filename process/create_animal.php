<?php

use Managers\AnimalManager;

require_once '../utils/connexion_db.php';
require_once '../vendor/autoload.php';

/**
 * @var PDO $db
 */

session_start();

if(isset($_POST['specie']) && isset($_POST['id_enclosure'])) {


    $species = $_POST['specie'];
    $idEnclosure = $_POST['id_enclosure'];

    $class = "Animals\\" . $species;

    $animalManager = new AnimalManager($db);

    $animal = new $class($species);
    $animal->setWeight(rand(1, 10));
    $animal->setHeight(rand(1, 10));
    $animal->setAge(rand(1, 10));
    $animal->setEnclosureId($idEnclosure);

    $animalManager->create($animal);


    header('Location: ../pages/enclosure.php?success=animal');
} else {
    header('Location: ../pages/enclosure.php?error=animal');
}
