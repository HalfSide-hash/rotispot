<?php include 'employeeheader.php'; ?>
<style type="text/css">
	aside{
		text-align: center;
		font-size: 35px;

	}

	 li{
		list-style-type: none;
		text-align: center;
	}

</style>

<!DOCTYPE html>
<html>
<body>
    <!-- Prints the Employee List-->
    <div class="container-fluid" style = "background-color: #ffc878;">
    <aside>
        <nav>
      <p><h1 style="font-size: 50px;">Select an option below:</h1></p>
      <p><a href="employeelist.php">View Employee List</a></p>
      <hr style="border-width: 3px; border-color: yellow;" >
      <p><a href="orderlist.php">View Pending Order List</a></p>
      <hr style="border-width: 3px; border-color: yellow;" >
      <p><a href="completedorderlist.php">View Completed Order List</a></p>
      </nav>
      </aside>
</div>
  </body>

</html>
