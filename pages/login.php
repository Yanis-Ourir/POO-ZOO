<?php
require_once '../utils/connexion_db.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POO - Login</title>
</head>
<body>
<form method="post" action="../process/register.php">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Pseudo :</label>
    </div>


    <!-- Submit button -->
    <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
</form>
</body>
</html>

