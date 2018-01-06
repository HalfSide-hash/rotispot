<?php
  session_start();
  include '../dbh.php';
  global $db;
  $user_name = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  $query = mysqli_query($db, "SELECT * FROM manager WHERE manager_Username='$user_name'");
  $exists = mysqli_num_rows($query);
  $table_users = "";
  $table_password = "";
  if ($exists > 0){
      while($row = mysqli_fetch_assoc($query))
      {
        $table_users = $row['manager_Username'];
        $table_password = $row['manager_Password'];
      }
      if(($user_name == $table_users) && password_verify($password, $table_password))
      {
          $_SESSION['user_name'] = $user_name;

      }
      else
      {
        print '<script>alert("Incorrect Password!");</script>';
        print '<script>window.location.assign("managerlogin.php");</script>';
      }
  }
  else
  {
        print '<script>alert("Incorrect Username!");</script>';
        print '<script>window.location.assign("managerlogin.php");</script>';
      }
  

?>

<!DOCTYPE html>
<html>
<?php include 'managerheader.php'; ?>
<div class="container-fluid" style = "background-color: #ffc878;">
    <style type="text/css">
        center{
            font-size:35px;
            font-family:verdana;
        }
    </style>
<body>

      <h1><center>Manager Login Confirmation</center> </h1><br>
      <h4><center>Welcome, <?php echo $_SESSION['user_name']; ?>!</center></h4><br>
  </body>
</div>
</html>
