<?php
  // Include database file
  include 'database.php';
  $customerObj = new database();
  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteRecord($deleteId);
  }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <meta name="description" content="Assignment 3">
        <meta name="robots" content="noindex, nofollow">
        <!--  Add our Google fonts  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <!--  Add our Bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
        <!--  Add our custom CSS  -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    </head>
    <body>
        <!--our header -->
        <header>
        <div>
          <a href="index.html"><img src="./img/image1.jpg" alt="header logo"></a>
        </div>
      <nav>
        <ul>
          <li><a href="index.php">Home page</a></li>
          <li><a href="add.php">User ProfilePage</a></li>
        </ul>
      </nav>
        </header>
        <!--section for our main page -->
        <section class= "masthead">
            <h1>CREATE YOUR  OWN PROFILE PAGE</h1>
        </section>
        <section class= "home"> <!--This section is for two photos -->
        <div id="image-1">
          <a href="index.php"><img class="image-1" src="./img/img5.png" alt="image 1"></a> <!-- Creating class for CSS-->
        </div>
        <div id="image-2">
          <a href="index.php"><img class="image-2" src="./img/img6.jpg" alt="image 2"></a>  <!--Creating class for CSS -->
        </div>
      </section>
      <!--main  -->
        <main class="container">
    <?php
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
      }
    ?>
    <!--section for view records -->
    <section>
      <h2>View Records
      <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
      </h2>
      <table class="table table-hover table-dark table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Bio</th>
          <th>PHONE NUMBER</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
          ?>
          <tr>
            <td><?php echo $customer['id'] ?></td>
            <td><?php echo $customer['fname'] ?></td>
            <td><?php echo $customer['email'] ?></td>
            <td><?php echo $customer['bio'] ?></td>
            <td><?php echo $customer['phonenumber'] ?></td>
            <td>
              <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $customer['id'] ?>">
                  <i class="fa fa-pencil text-white" ></i></a></button>
              <button class="btn btn-danger mr-2"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
                  <i class="fa fa-trash text-white"></i>
                </a></button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </section>
</main>
<!--our footer -->
<footer>
  <h4>End of page</h4>
</footer>
</body>
</html>