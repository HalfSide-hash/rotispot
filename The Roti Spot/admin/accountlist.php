<?php include 'adminheader.php';
//include the header and connect to the database
	include '../databaseConnect.php';
	global $db;
//query from customer
    $query = "SELECT *
                     FROM customer";
    $result = $db->prepare($query);
    $result->execute();
    $accounts = $result->fetchAll();
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
	<p><b>The following customers are in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		<td> </td>
		</tr>


		<?php foreach ($accounts as $account) : ?>
		<!--Shows first name, last name, email, username-->
			<tr>
			<td><?php echo $account['cust_FName']; ?></td>
			<td><?php echo $account['cust_LName']; ?></td>
			<td><?php echo $account['cust_Email']; ?></td>
			<td><?php echo $account['cust_UserName']; ?></td>
			<td align="center" style="padding-top: 4px; padding-bottom: 4px;">
				<a href="deleteaccount.php?id=<?php echo $account['cust_UserName']; ?>" class="btn btn-default btn-sm"
					style="background-color:#990000; color:white; border-color:#990000">
          		<span class="glyphicon glyphicon-trash"></span> Delete</a></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>

</body>
</html>
