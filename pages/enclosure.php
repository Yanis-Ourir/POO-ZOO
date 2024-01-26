<?php

use Managers\EnclosureManager;

require_once '../vendor/autoload.php';
require_once '../utils/connexion_db.php';
include_once '../partials/header.php';

session_start();

/**
 * @var PDO $db
 */

if(isset($_POST['id_enclosure'])) {
    $_SESSION['id_enclosure'] = $_POST['id_enclosure'];
}

if(!isset($_SESSION['id_enclosure'])) {
    header('Location: ../index.php');
}

$idEnclosure = $_SESSION['id_enclosure'];

$enclosureManager = new EnclosureManager($db);
$enclosure = $enclosureManager->findById($idEnclosure);
$animals = $enclosureManager->findAnimalsInEnclosure($enclosure['id']);

$classEnclosure = "Enclosures\\" . $enclosure['type'];
$currentEnclosure = new $classEnclosure($enclosure);

if($animals) {
    foreach ($animals as $animal) {
        $class = "Animals\\" . $animal['species'];
        $animalType = new $class($animal);
        try {
          $currentEnclosure->addAnimal($animalType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    $enclosureManager->update($currentEnclosure->getId(), $currentEnclosure);
}


?>
<div class="d-flex flex-column align-items-center mt-4">
    <h4>Manage your <?= $currentEnclosure->getName() ?></h4>
    <h5><?= $currentEnclosure->getType() ?></h5>
    <h6>Animals in your enclosure : <?= $currentEnclosure->getAnimalsCount() ?></h6>
</div>

<?php if(isset($_GET['error'])) {?>
    <div class="alert alert-danger mt-4" role="alert">
        <?= $_GET['error'] ?>
    </div>
<?php } else if (isset($_GET['success'])) { ?>
    <div class="alert alert-success mt-4" role="alert">
        <?= $_GET['success'] ?>
    </div>
<?php } ?>

<section class="d-flex justify-content-around align-items-center">
    <div class="enclosure">
        <div class="enclosure__cleanliness">
            <p>Cleanliness : <?= $currentEnclosure->getCleanliness() ?></p>
        </div>
        <div>
            <?php foreach($currentEnclosure->getAnimals() as $animal) { ?>
                <div class="">
                    <img src="../assets/<?= $animal->getImage() ?>" alt="<?= $animal->getSpecies() ?>" style="width: 200px">
                </div>
            <?php } ?>
        </div>

    </div>

    <div>
        <p>Animals in your enclosure :</p>
        <?php foreach($currentEnclosure->getAnimals() as $animal) { ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title"><?= $animal->getSpecies() ?></h5>
                    <p class="card-text">Weight : <?= $animal->getWeight() ?></p>
                    <p class="card-text">Height : <?= $animal->getHeight() ?></p>
                    <p class="card-text">Age : <?= $animal->getAge() ?></p>
                </div>
            </div>
        <?php } ?>

    </div>


</section>

    <div class="d-flex justify-content-center mt-4">
        <form action="../process/create_animal.php" method="post">
            <input type="hidden" name="id_enclosure" value="<?= $currentEnclosure->getId() ?>">
            <label for="specie" class="form-label">Add animal to your enclosure : </label>
            <select name="specie" id="specie" class="form-select">
                <option value="Fish">Fish</option>
                <option value="Shark">Shark</option>
                <option value="Tiger">Tiger</option>
                <option value="Bear">Bear</option>
                <option value="Eagle">Eagle</option>
            </select>

            <button type="submit" class="btn btn-info mt-2">Add animal</button>
    </div>




<?php include_once '../partials/footer.php'; ?>