<?php include 'adminheader.php';
//connect to database
	include '../databaseConnect.php';

    $query = "SELECT *
                     FROM manager";
    $result = $db->prepare($query);
    $result->execute();
    $managers = $result->fetchAll();
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
	<p><b>The following manager information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		<td> </td>
		</tr>
<!-- Print Managers-->
		<?php foreach ($managers as $manager) : ?>
			<tr>
			<td><?php echo $manager['manager_FName']; ?></td>
			<td><?php echo $manager['manager_LName']; ?></td>
			<td><?php echo $manager['manager_Email']; ?></td>
			<td><?php echo $manager['manager_Username']; ?></td>
			<td align="center" style="padding-top: 4px; padding-bottom: 4px;">
				<a href="deletemanager.php?id=<?php echo $manager['manager_Username']; ?>" class="btn btn-default btn-sm"
					style="background-color:#990000; color:white; border-color:#990000">
          		<span class="glyphicon glyphicon-trash"></span> Delete</a></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>
</body>
</html>