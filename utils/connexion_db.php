<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=tp_zoo', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

