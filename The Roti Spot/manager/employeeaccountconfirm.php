<?php
    include 'managerheader.php';
  include '../dbh.php';
  global $db;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $user_name = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['pass']);
    $ssn = mysqli_real_escape_string($db, $_POST['ssn']);
    $bool = true;

    $query = mysqli_query($db, "SELECT * FROM employee");

    while($row = mysqli_fetch_array($query))
    {
      $table_username = $row['emp_UserName'];
      if($user_name == $table_username)
      {
        $bool = false;
        print '<script>alert("Username has been taken!");</script>';
        print '<script>window.location.assign("employeecreateaccount.php");</script>';
      }


    }

    if($bool)
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($db, "INSERT INTO employee (emp_FName, emp_LName, emp_Phone, emp_Address, emp_Email, emp_DOB, emp_username, emp_password, emp_SSN)
        VALUES ('$first_name', '$last_name', '$phone', '$address', '$email', '$dob', '$user_name', '$hash', '$ssn')");
      print '<script>alert("Successfully registered!");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <body>
<div class="container-fluid" style = "background-color: #ffc878;">
      <h1>Employee Account Confirmation </h1><br>
      <h4>First Name:</h4>
      <?php echo $first_name; ?><br>
      <h4>Last Name:</h4>
      <?php echo $last_name; ?><br>
      <h4>Phone:</h4>
      <?php echo $phone; ?><br>
      <h4>Address:</h4>
      <?php echo $address; ?><br>
      <h4>Date of Birth:</h4>
      <?php echo $dob; ?><br>
      <h4>Username:</h4>
      <?php echo $user_name; ?><br>

     </div>

  </body>

</html>
