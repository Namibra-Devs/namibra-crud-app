<?php
require_once "./auxiliaries.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the employee record
    $employee = new Employee($db);
    $result = $employee->delete($id);

    // Check if the deletion was successful
    if ($result) {
        // Redirect to the dashboard or any other page
        header('Location: ./dashboard.php');
        exit();
    } else {
        // Handle the error if the deletion fails
        echo 'Error deleting the employee record.';
    }
}
