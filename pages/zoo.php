<?php
require_once '../partials/header.php';
session_start();
?>

<h3 class="text-center mt-4">Welcome <?= $_SESSION['pseudo'] ?></h3>
<h4 class="text-center mt-4">Create your Zoo !</h4>

<div class="d-flex justify-content-center">
    <img src="https://cdn.akamai.steamstatic.com/steam/apps/1631920/ss_ecae62d4da95b129619b606d6f3c728ffac754f2.1920x1080.jpg?t=1661280557" class="mt-4 w-50" alt="Zoo game">
</div>


<form action="../process/create_zoo.php" method="post" class="d-flex flex-column align-items-center mt-4">
    <div class="form-group w-25">
        <label for="zoo_name">Name of your zoo : </label>
        <input name="zoo_name" class="form-control" placeholder="Zootopia" type="text">
    </div>

    <button type="submit" class="btn btn-info mt-2">Create Zoo</button>
</form>



<?php include_once '../partials/footer.php'; ?>
