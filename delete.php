<?php
require_once "./auxiliaries.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $employee = new Employee($db); //CREATE A NEW EMPLOYEE INSTANCE
    $result = $employee->delete($id); //CALL THE EMPLOYEE METHOD

    // CHECK IF DELETION WAS SUCCESFULL
    if ($result) {
        header('Location: ./dashboard.php'); //REDIRECT USER TO THE DASHBOARD
        exit();
    } else {

        echo 'Error deleting the employee record.'; // DISPLAY ERROR MESSAGE
    }
}
