<?php

use Animals\Fish;
use Animals\Shark;
use Animals\Tiger;
use Enclosures\Aquarium;

require_once 'utils/autoloader.php';

if(!isset($_SESSION)) {
    header('Location: pages/login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POO - ZOO</title>
</head>
<body>
<?php
    $aquarium = new Aquarium('Aquarium 1');

    $sharkOne = new Shark('Sharky');
    $tigerOne = new Tiger('Tigrou');
    $fishOne = new Fish('Nemo');
    echo $aquarium->getName();


    $aquarium->addAnimal($fishOne);
    $aquarium->addAnimal($sharkOne);
    $aquarium->setCleanliness("dirty");

    $aquarium->data();

    $aquarium->removeAnimal($fishOne);

    $aquarium->data();

    $aquarium->addAnimal($fishOne);

    foreach ($aquarium->getAnimals() as $animal) {
        echo $animal->movement() . "<br>";
    }


?>
</body>
</html>
