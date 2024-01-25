<?php

use Managers\ZooManager;
use Zoos\Zoo;

require_once './utils/autoloader.php';
require_once 'utils/connexion_db.php';

if(!isset($_SESSION['pseudo'])) {
    header('Location: pages/login.php');
} else if (!isset($_SESSION['id_zoo'])) {
    header('Location: pages/zoo.php');
}

/**
 * @var PDO $db
 */

$zooManager = new ZooManager($db);
$zoo = $zooManager->findById($_SESSION['id_zoo']);
$enclosures = $zooManager->enclosureZoo($_SESSION['id_zoo']);

echo "<pre>";
var_dump($enclosures);
echo "</pre>";

$currentZoo = new Zoo($zoo['name']);

foreach ($enclosures as $enclosure) {
    $class = "Enclosures\\" . $enclosure['type'];
    $enclosureType = new $class($enclosure);
    echo "<pre>";
    var_dump($enclosureType);
    echo "</pre>";
    try {
        $currentZoo->addEnclosure($enclosureType);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$enclosuresZoo = $currentZoo->getEnclosures();

include_once 'partials/header.php';
?>

<h2 class="text-center mt-4">Welcome to the management of your zoo : <?= $zoo['name'] ;?></h2>

<h4 class="text-center mt-4">Get started by creating your first enclosure</h4>

<form action="process/create_enclosure.php" method="post" class="mt-4 p-4">
    <label for="enclosure_name" class="form-label">Name of your enclosure : </label>
    <input class="form-control" type="text" name="enclosure_name" id="enclosure_name" placeholder="Aquaboulevard">

    <label for="enclosure_type" class="form-label">Type of enclosure :</label>
    <select name="enclosure_type" id="enclosure_type" class="form-select">
        <option value="Aquarium">Aquarium</option>
        <option value="Aviary">Aviary</option>
        <option value="Terrarium">Terrarium</option>
    </select>

    <button type="submit" class="btn btn-info mt-4">Create Enclosure</button>
</form>

<div class="container">
    <div class="row justify-content-center">
<?php foreach ($enclosuresZoo as $enclosure) { ?>
        <div class="col-4">
          <div class='card mt-4'>
            <div class='card-body'>
                <h5 class='card-title'><?= $enclosure->getName() ?></h5>
                <p class='card-text'>type : <?= $enclosure->getType() ?></p>
                <p class='card-text'>Cleanliness : <?= $enclosure->getCleanliness() ?></p>
                <p class='card-text'>Animals : <?= $enclosure->getAnimalsCount() ?></p>
                <form action="pages/enclosure.php" method="post">
                    <input type="hidden" name="id_enclosure" value="<?= $enclosure->getId() ?>">
                    <button type="submit" class="btn btn-primary">Manage enclosure</button>
                </form>
            </div>
          </div>
        </div>
<?php } ?>
    </div>
</div>









<?php include_once 'partials/footer.php'; ?>


