<?php include 'adminheader.php';
//connect to the database
	include '../databaseConnect.php';
	global $db;

   //gets ready to display admins
    $queryAdmins = "SELECT *
                     FROM admin";
    $result = $db->prepare($queryAdmins);
    $result->execute();
    $admin = $result->fetchAll();
    $result->closeCursor();

?>

<html>
<head>
	<style>
		td
		{
			border-style: double;
			padding-left: 10px;
			padding-right: 10px;
		}
	</style>
</head>

<body>
     <div class="container-fluid" style = "background-color: #ffc878;">
	<p><b>The following admin information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		</tr>


		
		<?php foreach ($admin as $admin) : ?>
			<tr>
			<td><?php echo $admin['admin_FName']; ?></td>
			<td><?php echo $admin['admin_LName']; ?></td>
			<td><?php echo $admin['admin_Email']; ?></td>
			<td><?php echo $admin['admin_Username']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>

</body>
</html>
