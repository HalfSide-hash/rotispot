<?php
session_start();
  //connect to database
  include '../dbh.php';
  global $db;
  //prevent sql injections
  $user_name = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  //query the Customer table
  $query = mysqli_query($db, "SELECT * FROM customer WHERE cust_UserName='$user_name'");
  $exists = mysqli_num_rows($query);
  $table_users = "";
  $table_password = "";
  //checks to see if username was wrong
if ($exists > 0){
      //if it wasnt we check the password
      while($row = mysqli_fetch_assoc($query))
      {
        $table_users = $row['cust_UserName'];
        $table_password = $row['cust_Password'];
      }
      //have to read against hash
      if(($user_name == $table_users) && password_verify($password, $table_password))
      {
        //password matches
          $_SESSION['user_name'] = $user_name;
      }
      //password didnt match
      else
      {
        print '<script>alert("Incorrect Password!");</script>';
        //redirects to customerlogin.php
        print '<script>window.location.assign("customerlogin.php");</script>';
      }
}
else //username didnt match
      {
        print '<script>alert("Incorrect Username!");</script>';
        //redirects to customerlogin.php
        print '<script>window.location.assign("customerlogin.php");</script>';
      }


  header('Location: homepage.php');
?>
