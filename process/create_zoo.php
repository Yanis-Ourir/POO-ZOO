<?php

use Managers\ZooManager;
use Zoos\Zoo;

require_once '../utils/connexion_db.php';
require_once '../vendor/autoload.php';


/**
 * @var PDO $db
 */
session_start();

if(isset($_POST['zoo_name']) && $_SESSION['id_staff']) {
    $zooName = $_POST['zoo_name'];
    $zooManager = new ZooManager($db);
    $zoo = new Zoo($zooName);
    $zooManager->create($zoo);

    $_SESSION['id_zoo'] = $db->lastInsertId();

   header('Location: ../index.php');
} else {
   header('Location: ../pages/zoo.php');
}
