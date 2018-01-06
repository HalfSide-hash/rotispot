<?php
include 'customerheader.php';
  include '../dbh.php';
  global $db;
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $first = mysqli_real_escape_string($db, $_POST['firstname']);
    $last = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phonenumber']);
    $uid = mysqli_real_escape_string($db, $_POST['username']);
    $pwd = mysqli_real_escape_string($db, $_POST['pass']);
    $bool = true;

    $query = mysqli_query($db, "SELECT * FROM customer");

    while($row = mysqli_fetch_array($query))
    {
      $table_username = $row['cust_Username'];

      if($uid == $table_username)
      {
        $bool = false;
        print '<script>alert("Username has been taken! Please try again.");</script>';
        print '<script>window.location.assign("customersignup.php");</script>';
      }
    }
    if($bool)
    {
      $hash = password_hash($pwd, PASSWORD_DEFAULT);
      mysqli_query($db, "INSERT INTO customer (cust_FName, cust_LName, cust_Phone, cust_Email, cust_Username, cust_Password)
        VALUES ('$first', '$last', '$phone', '$email', '$uid', '$hash')");
      print '<script>alert("Successfully registered!");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <body>
<div class="container-fluid" style = "background-color: #ffc878;">
      <h1>New Account Confirmation </h1><br>
      <h4>First Name:</h4>
      <?php echo $first; ?><br>
      <h4>Last Name:</h4>
      <?php echo $last; ?><br>
      <h4>Email:</h4>
      <?php echo $email; ?><br>
      <h4>Username:</h4>
      <?php echo $uid; ?><br>
</div>
  </body>
</html>
