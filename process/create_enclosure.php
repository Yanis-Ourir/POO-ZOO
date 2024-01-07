<?php

use Managers\EnclosureManager;


require_once '../vendor/autoload.php';

require_once '../utils/connexion_db.php';

session_start();

/**
 * @var PDO $db
 */

if(isset($_POST['enclosure_name']) && isset($_POST['enclosure_type'])) {

    $enclosureName = $_POST['enclosure_name'];
    $enclosureType = $_POST['enclosure_type'];

    $class = "Enclosures\\" . $enclosureType;

    $enclosureManager = new EnclosureManager($db);
    $enclosure = new $class($enclosureName);
    $enclosure->setType($enclosureType);

    try {
        $enclosure->setCleanliness('clean');
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $enclosureManager->create($enclosure);

    header('Location: ../index.php');
}
