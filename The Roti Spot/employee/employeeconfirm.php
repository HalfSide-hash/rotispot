<?php
  session_start();
  include '../dbh.php';
  global $db;
  $user_name = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  $query = mysqli_query($db, "SELECT * FROM employee WHERE emp_Username='$user_name'");
  $exists = mysqli_num_rows($query);
  $table_users = "";
  $table_password = "";
  if ($exists > 0){
      while($row = mysqli_fetch_assoc($query))
      {
        $table_users = $row['emp_UserName'];
        $table_password = $row['emp_Password'];
      }
      if(($user_name == $table_users) && password_verify($password, $table_password))
      {
          $_SESSION['user_name'] = $user_name;
      }
      else
      {
        print '<script>alert("Incorrect Password!");</script>';
        print '<script>window.location.assign("employeelogin.php");</script>';
      }
  }
  else
      {
        print '<script>alert("Incorrect Username!");</script>';
        print '<script>window.location.assign("employeelogin.php");</script>';
      }
  
?>

<!DOCTYPE html>
<html>
<?php include 'employeeheader.php'; ?>
<style type=text/css>
    center{
        font-family:verdana;
        font-size:35px;
    }
</style>
<body>
<div class="container-fluid" style = "background-color: #ffc878;">
      <h1><center>Employee Login Confirmation</center></h1><br>
      <h4><center>Welcome, <?php echo $_SESSION['user_name']; ?>!</center></h4><br>
</div>
  </body>

</html>
