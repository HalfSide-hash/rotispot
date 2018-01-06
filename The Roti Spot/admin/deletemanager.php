<?php include 'adminheader.php'; 
  //connect to database
  include '../databaseConnect.php';
  global $db;
  $username = $_GET['id'];
?>

<link rel="stylesheet" type="text/css" href="../modifyStyle.css">
   <main>
       <div class="container-fluid" style = "background-color: #ffc878;">
       <form action="#" method="post">
    <h2 align="center">User Deletion</h2>
    <div class="container" style="padding-left: 400px;">
        <div class="panel panel-default" style="width:50%;">
          <div class="panel-heading" style="background-color: coral; color: white; font-size:18px;">
          Are You Sure You Want to Delete:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><input name = "user" type="text" readonly = "true" class="form-control text-center"
                value="<?php echo $username; ?>"</input></div>
        </div>
    </div>
   <center><button type='submit' name = 'submit' class="btn btn-primary"/>Yes</button></center>
    </form>
    <?php
    //deletes manager upon confirm
		if(( isset( $_POST['submit'] ) )){
		    $newname = $_POST['user'];
		        $stmt = $db->query("SELECT * FROM manager");
  $db->exec("DELETE FROM manager WHERE manager_Username = '$username'");
				print '<script>window.location.assign("managerlist.php");</script>';
				}
	    ?>
    <p></p><p align="center"><a href="managerlist.php">Return to Manager List</a></p>
    </div>
   </main>
  </body>
</html>
