<?php

// Include database file
include 'database.php';

$customerObj = new database();

// Insert Record in profile table
if(isset($_POST['submit'])) {
  $customerObj->insertData($_POST);
}

?>
<!--our html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>profile</title>
  <meta name="description" content="Assignment 3">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
    <!--header -->
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
  <!--section for user profile page -->
  <section>
    <h1>User Profile Page | Add Record</h1>
  </section>
  <!-- section for form-->
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h2>Insert Data</h2>
          </div>
          <div class="card-body bg-light">
            <form action="add.php" method="POST">
              <div class="form-group">
                <label for="fname">Name:</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter name" required="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
              </div>
              <div class="form-group">
                <label for="bio">Bio:</label>
                <input type="text" class="form-control" name="bio" placeholder="Enter bio" required="">
              </div>
              <div class="form-group">
                <label for="phonenumber">Phonenumber</label>
                <input type="text" class="form-control" name="phonenumber" placeholder="Enter phonenumber" required="">
              </div>
              <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <!--footer -->
  <h4>End of page</h4>
</footer>
</body>
</html>