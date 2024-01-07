<?php

use Managers\EmployeeManager;
use Staffs\Employee;

require_once '../vendor/autoload.php';
require_once '../utils/connexion_db.php';

session_start();


/**
 * @var PDO $db
 */

if(isset($_POST['pseudo']) && isset($_POST['age']) && isset($_POST['gender'])) {
    $pseudo = $_POST['pseudo'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $employeeManager = new EmployeeManager($db);
    $employee = new Employee($pseudo);
    $employee->setAge($age);
    $employee->setGender($gender);
    $employeeManager->create($employee);

    $_SESSION['pseudo'] = $employee->getName();
    $_SESSION['id_staff'] = $employeeManager->getId();

    header('Location: ../index.php');
}


