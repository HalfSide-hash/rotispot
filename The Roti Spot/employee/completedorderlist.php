<?php include 'employeeheader.php';
	include '../databaseConnect.php';
	//prepare the proper order list
    $queryOrders = "SELECT *
                     FROM orders INNER JOIN orderitems ON (orders.order_ID=orderitems.order_ID) INNER JOIN product ON (orderitems.pro_ID=product.pro_ID) INNER JOIN customer ON (orders.cust_ID = customer.cust_ID) WHERE (orders.order_Status = 'Y') ORDER BY orders.order_Date DESC";
    $result = $db->prepare($queryOrders);
    $result->execute();
    $orders = $result->fetchAll();
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
	<p><b>The following orders are in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>Order Date</td>
		<td>Order Bill</td>
		<td>Customer Name</td>
		<td> Phone Number</td>
		<td> Order Items</td>
		<td> Quantity </td>
		</tr>

		<?php foreach ($orders as $i => $order) : ?>
			<tr>
				<?php if (($orders[$i] > 0) && ($orders[$i]['order_ID'] === $orders[$i-1]['order_ID'])){ ?>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
				<?php } else{ ?>
					<td><?php echo $orders[$i]['order_Date']; ?></td>
					<td><?php echo $orders[$i]['order_TotalPrice']; ?></td>
					<td><?php echo $orders[$i]['cust_FName']; ?></td>
					<td><?php echo $orders[$i]['cust_Phone']; ?></td>
					<?php } ?>
			<td><?php echo $orders[$i]['pro_Name']; ?></td>
			<td><?php echo $orders[$i]['item_Quantity']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>
</div>
</body>
</html>
