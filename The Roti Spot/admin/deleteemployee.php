<?php include 'adminheader.php';
//connect to database
  include '../databaseConnect.php';
  global $db;
  $username = $_GET['id'];
?>
<link rel="stylesheet" type="text/css" href="../productStyle.css">
   <main>
       <!-- To Delete a User-->
       <form action="#" method="post">
    <div class="container-fluid" style = "background-color: #ffc878;">
    <h2 align="center">User Deletion</h2>
    <div class="container" style="padding-left: 400px;">
        <div class="panel panel-default" style="width:50%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; background-color: coral; font-size:18px;">
          This User Will Be Deleted, Are You Sure?:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><input name = "user" type="text" readonly = "true" class="form-control text-center"
                value="<?php echo $username; ?>"</input></div>
          
        </div>
    </div>
    <center><button type='submit' name = 'submit' class="btn btn-primary"/>Yes</button></center>
    </form>
    
    <?php
    //deletes the employee upon a yes
		if(( isset( $_POST['submit'] ) )){
		    $newname = $_POST['user'];
		      $stmt = $db->query("SELECT * FROM employee");
                $db->exec("DELETE FROM employee WHERE emp_UserName = '$newname'");
				print '<script>window.location.assign("employeelist.php");</script>';
				}
	    ?>
		
    <p></p><p align="center"><a href="employeelist.php">Return to Employee List</a></p>
   </main>
   </div>
  </body>
</html>
