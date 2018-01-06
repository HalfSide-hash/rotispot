<?php include 'employeeheader.php';
	include '../databaseConnect.php';
    $queryEmployees = "SELECT *
                     FROM employee";
    $result = $db->prepare($queryEmployees);
    $result->execute();
    $employees = $result->fetchAll();
    $result->closeCursor();
?>

<html>
<head>
	<style>
		td
		{
			border-style: double;
			padding-left:10px;
			padding-right:10px;
		
		}
	</style>
</head>

<body>
    <div class="container-fluid" style = "background-color: #ffc878;">
	<p><b>The following employee information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Phone</td>
		</tr>

		<?php foreach ($employees as $employee) : ?>
			<tr>
			<td><?php echo $employee['emp_FName']; ?></td>
			<td><?php echo $employee['emp_LName']; ?></td>
			<td><?php echo $employee['emp_Phone']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>
</div>
</body>
</html>