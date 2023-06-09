<?php
require_once "./auxiliaries.php"; //IMPORT THE auxiliaries.php

if (isset($_GET['id'])) { //CHECK FOR QUERY PARAMETER
    $id = $_GET['id']; //SET THE ID VALUE OF THE QUERY TO VARIABLE $id

    if (isset($_POST['submit'])) { //CHECK ONCLICK ON SUBMIT

        //STORE VARIOUS INPUT VALUES IN A VARIABLE FOR EASY ACCESS
        $uploadFile = $_FILES['image']['name'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $age = $_POST['age'];
        $img = $uploadFile;

        $targetFolder = "image_uploads/"; //ASSIGN DESIRED LOCATION TO STORE IMAGES TO VARIABLE $ 
        $filename = $targetFolder . basename($uploadFile);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) { //MOVE IMAGE FROM TEMPORAL LOCATION TO UPLOADS FOLDER

            //STORE VARIOUS VARIABLES IN THE DATA OBJECT
            $data = [
                'name' => $name,
                'position' => $position,
                'age' => $age,
                'imageSrc' => $img
            ];
            $employee = new Employee($db); //NEW INSTANCE OF EMPLOYEE
            $employee->update($id, $data); //CALL THE UPDATE METHOD WITH $id AND $data AS PARAMETERS
            header("Location: dashboard.php"); //REDIRECT USER TO DASHBOARD
            exit(); //STOP EXECUTING SCRIPT
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./styles/createstyles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <a href="./dashboard.php"><button type="button" class="btn btn-success">View Dashboard</button></a>
    <!-- FORMS GOES HERE -->
    <form method="POST" action="./edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <h1 class="text-primary text-center m-4">UPDATE USER</h1>
        <div class="form-group md-3">
            <label for="fullname">Full Name</label>
            <input type="name" class="form-control" value="" id="fullname" aria-describedby="nameHelp" name="name" placeholder="Enter full name">
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Type your position">
        </div>
        <div class="form-group ">
            <label for="age">Age</label>
            <input type="number" class="form-control" value="" id="age" name="age" placeholder="Choose your Age">
        </div>

        <div class="form-group ">
            <label for="image">Insert Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" name="submit" class=".px-2 btn bttn btn-primary">Update</button>

    </form>

</html>