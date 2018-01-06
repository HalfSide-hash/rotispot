<?php include 'managerheader.php'; 
  include '../databaseConnect.php';
  global $db;
  $productname = $_GET['id'];
?>

<link rel="stylesheet" type="text/css" href="../modifyStyle.css">
   <main>
       <form action="#" method="post">
           <div class="container-fluid" style = "background-color: #ffc878;">
    <h2 align="center">Product Deletion</h2>
    <div class="container" style="padding-left: 400px;">
        <div class="panel panel-default" style="width:50%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; background-color: coral; font-size:18px;">
          Are You Sure You Want to Delete:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><input name = "product" type="text" readonly = "true" class="form-control text-center"
                value="<?php echo $productname; ?>"</input></div>
        </div>
    </div>
    <center><button type='submit' name = 'submit' class="btn btn-primary"/>Yes</button></center>
    </form>
    <?php
		if(( isset( $_POST['submit'] ) )){
		    $oldproduct = $_POST['product'];
		        $stmt = $db->query("SELECT * FROM product");
  $db->exec("DELETE FROM product WHERE linkName = '$oldproduct'");
				print '<script>window.location.assign("productlist.php");</script>';
				}
	    ?>
    <p></p><p align="center"><a href="productlist.php">Return to Product List</a></p>
   </main>
   </div>
  </body>
</html>
