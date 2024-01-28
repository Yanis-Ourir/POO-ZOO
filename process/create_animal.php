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

    $animal = new $class([
        'species' => $species,
        'weight' => rand(1, 10),
        'height' => rand(1, 10),
        'age' => rand(1, 10),
        'hungry' => rand(0, 1),
        'sleep' => rand(0, 1),
        'sick' => rand(0, 1),
        'idEnclosure' => $idEnclosure
    ]);


    $animalManager->create($animal);

    $_SESSION['id_enclosure'] = $idEnclosure;

    header('Location: ../pages/enclosure.php');
}
