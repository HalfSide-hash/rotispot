<?php include 'employeeheader.php';
	include '../databaseConnect.php';
	global $db;
    $queryOrders = "SELECT *
                     FROM orders INNER JOIN orderitems ON (orders.order_ID=orderitems.order_ID) INNER JOIN customer ON (orders.cust_ID = customer.cust_ID) INNER JOIN product ON (orderitems.pro_ID=product.pro_ID) WHERE (orders.order_Status = 'N') ORDER BY orders.order_Date";
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
	<form action="#" method="post">
	<table>
	<tbody>
		<tr>
		<td></td>
		<td>Order Date</td>
		<td>Name</td>
		<td>Phone Number</td>
		<td>Order Bill</td>
		<td> Order Items</td>
		<td> Quantity </td>
		</tr>

		<input type='checkbox' name= 'checklist[]' style = "display:none" value = "0"/>
		<?php foreach ($orders as $i => $order) : ?>
			<tr>
				<?php if (($orders[$i] > 0) && ($orders[$i]['order_ID'] === $orders[$i-1]['order_ID'])){ ?>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
					<td><?php echo " "; ?></td>
				<?php } else{ ?>
					<td><input type='checkbox' name= 'checklist[]' value = "<?php echo $orders[$i]['order_ID'];?>"/></td>
					<td><?php echo $orders[$i]['order_Date']; ?></td>
					<td><?php echo $orders[$i]['cust_FName']; ?></td>
					<td><?php echo $orders[$i]['cust_Phone']; ?></td>
					<td><?php echo $orders[$i]['order_TotalPrice']; ?></td>
					<?php } ?>
			<td><?php echo $orders[$i]['pro_Name']; ?></td>
			<td><?php echo $orders[$i]['item_Quantity']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>
  <br>
	<button type='submit' class="btn btn-primary"/>Confirm Orders</button>
</form>
</div>
<?php
		if(!empty($_POST['checklist'])){
				foreach($_POST['checklist'] as $selected){
					$queryOrders = "UPDATE orders SET order_Status='Y' WHERE order_ID = '$selected'";
					$stmt = $db->query($queryOrders);
					$stmt->execute();
					$stmt->closeCursor();
				}
				print '<script>window.location.assign("orderlist.php");</script>';
		die; //refreshes the page immediately
		}?>

</body>
</html>
