<?php
require_once "./auxiliaries.php";
//CREATING AN OBJECT OF THE EMPLOYEE CLASS
$employee = new Employee($db);

//SELECTING EMPLOYEES FROM THE DATABASE
$result = $employee->getAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./styles/style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Namibra - Crud App</title>
</head>

<body>
  <?php
  include "./navbar.php"
  ?>
  <main>
    <div class="bttn bttnCreate">
      <div class="buttonWhite buttonBgGreen">
        <a href="./create.php">
          <p>Create User</p>
        </a>
      </div>
    </div>

    <!-- INDIVIDUAL CARD ITEMS -->
    <?php foreach ($result as $user) {
      // USING THE FOREACH LOOP TO RENDER CARDS ON DASHBOARD
    ?>

      <div class="employeeCard flexItems centerEmployeeCard">
        <div class="cardChild cardimageSection">
          <img src="<?php echo "./image_uploads/" . $user['imageSrc'] ?>" height="100%" width="80%" class="centerImage" />
        </div>
        <div class="cardChild cardtextSection">
          <h2 class="employeeName"><?php echo $user['name'] ?></h2>
          <p class="employeePosition"><?php echo $user['position'] ?></p>
          <p class="employeeAge"><?php echo $user['age'] . " Years" ?></p>
          <div class="iconsDiv flexItems">
            <div class="bttn">
              <a href="./edit.php?id=<?php echo $user['id']  ?>">
                <div class="buttonWhite buttonBgWhite">
                  <p>Edit</p>
                  <i class="fa-solid fa-pen-to-square icons"></i>
                </div>
              </a>
            </div>
            <div class="bttn bttn-delete">
              <a href="./delete.php?id=<?php echo $user['id']  ?>">
                <div class="buttonWhite buttonBgWhite">
                  <p>Delete</p>
                  <i class="fa-solid fa-trash-can icons"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php }
    // ENDING THE FOREACH LOOP
    ?>
    <!-- END OF CARD ITEM -->
  </main>
</body>

</html>