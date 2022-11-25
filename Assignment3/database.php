<?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Harlin200510664";
  private $password   = "zRRLsxOEFN";
  private $database   = "Harlin200510664";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert profile data into profile table
  public function insertData($post)
  {
    $fname = $this->con->real_escape_string($_POST['fname']);
    $email = $this->con->real_escape_string($_POST['email']);
    $bio = $this->con->real_escape_string($_POST['bio']);
    $phonenumber = $this->con->real_escape_string($_POST['phonenumber']);
    $query="INSERT INTO profilepage(fname,email,bio,phonenumber) VALUES('$fname','$email','$bio','$phonenumber')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  // Fetch profile records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM profilepage";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

  // Fetch single data for edit from profile table
  public function displayRecordById($id)
  {
    $query = "SELECT * FROM profilepage WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  // Update profile data into profile table
  public function updateRecord($postData)
  {
    $fname = $this->con->real_escape_string($_POST['uname']);
    $email = $this->con->real_escape_string($_POST['uemail']);
    $bio = $this->con->real_escape_string($_POST['ubio']);
    $phonenumber = $this->con->real_escape_string($_POST['uphonenumber']);
    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE profilepage SET fname = '$fname', email = '$email', bio = '$bio', phonenumber = '$phonenumber' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }

  }

  // Delete profile data from profile table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM profilepage WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
}
