<?php

use Managers\AnimalManager;
use Managers\EnclosureManager;
use Animals\Animal;

require_once '../vendor/autoload.php';
require_once '../utils/connexion_db.php';

/**
 * @var PDO $db
 */

if(isset($_POST['id_animal']) && isset($_POST['id_enclosure'])) {


    $idAnimal = $_POST['id_animal'];
    $idEnclosure = $_POST['id_enclosure'];

    $animalManager = new AnimalManager($db);
    $animalData = $animalManager->findById($idAnimal);
    $classAnimal = "Animals\\" . $animalData['species'];
    $animal = new $classAnimal($animalData);



    $animalManager->delete($idAnimal);

    $enclosureManager = new EnclosureManager($db);
    $enclosureData = $enclosureManager->findById($idEnclosure);
    $classEnclosure = "Enclosures\\" . $enclosureData['type'];
    $enclosure = new $classEnclosure($enclosureData);
    $enclosure->removeAnimal($animal);
    $enclosureManager->update($enclosure);

    $_SESSION['id_enclosure'] = $_POST['id_enclosure'];


   header('Location: ../pages/enclosure.php');
}
