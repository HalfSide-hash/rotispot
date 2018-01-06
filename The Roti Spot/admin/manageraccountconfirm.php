<?php include 'adminheader.php';

  include '../dbh.php';
  global $db;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $user_name = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['pass']);
    $bool = true;

    $query = mysqli_query($db, "SELECT * FROM manager");
//check to see if username has been taken first
    while($row = mysqli_fetch_array($query))
    {
      $table_username = $row['manager_Username'];

      if($user_name == $table_username)
      {
        $bool = false;
        
        print '<script>alert("Username has been taken!");</script>';

        print '<script>window.location.assign("createmanager.php");</script>';
      }


    }

    if($bool)
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      
      mysqli_query($db, "INSERT INTO manager (manager_FName, manager_LName, manager_Email, manager_Username, manager_Password)
        VALUES ('$first_name', '$last_name', '$email', '$user_name', '$hash')");

      print '<script>alert("Successfully registered!");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
  <body>

      <h1>Manager Account Confirmation </h1><br>
      <h4>First Name:</h4>
      <?php echo $first_name; ?><br>
      <h4>Last Name:</h4>
      <?php echo $last_name; ?><br>
      <h4>Email:</h4>
      <?php echo $email; ?><br>
      <h4>Username:</h4>
      <?php echo $user_name; ?><br>

      <?php include '../footer.php'; ?>

  </body>

</html>
