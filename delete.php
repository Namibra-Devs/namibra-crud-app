<?php
require_once "./auxiliaries.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //CREATE A NEW EMPLOYEE INSTANCE
    $employee = new Employee($db);
    //CALL THE EMPLOYEE METHOD
    $result = $employee->delete($id);

    // CHECK IF DELETION WAS SUCCESFULL
    if ($result) {
        //REDIRECT USER TO THE DASHBOARD
        header('Location: ./dashboard.php');
        exit();
    } else {
        // DISPLAY ERROR MESSAGE
        echo 'Error deleting the employee record.';
    }
}
