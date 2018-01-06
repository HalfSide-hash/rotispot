<?php
    //database connection
    include '../databaseConnect.php';
    global $db;
    $query = "SELECT *
                     FROM product
                     ORDER by pro_Category";
    $result = $db->prepare($query);
    $result->execute();
    $products = $result->fetchAll();
    $result->closeCursor();
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../modifyStyle.css">

	<style>
		td{
			border-style: double;
			padding-left: 10px;
			padding-right: 10px;
		}
		table{width:75%;}
	</style>
	<div class="container-fluid" style = "background-color: #ffc878;">
	<h2 align="center">List of Products</h2><br>
	<table align="center">
	<tbody>
		<tr>
		  <td style="font-weight: bold;">Category</td>
		  <td style="font-weight: bold;">Name</td>
		  <td style="font-weight: bold;">Filename</td>
		  <td style="font-weight: bold;">Price</td>
		  <td style="font-weight: bold;">Quantity</td>
		  <td style="font-weight: bold;">Description</td>
		  <td style="font-weight: bold;">Edit</td>
		  <td style="font-weight: bold;">Delete Product</td>
		</tr>
		<?php foreach ($products as $product) : ?>
			<tr>
			<td><?php echo $product['pro_Category']; ?></td>
			<td><?php echo $product['pro_Name']; ?></td>
			<td><?php echo $product['linkName']; ?></td>
			<td><?php echo $product['pro_Price']; ?></td>
			<td><?php echo $product['pro_Quantity']; ?></td>
			<td><?php echo $product['pro_Description']; ?></td>
			<td align="center" style="padding-top: 4px; padding-bottom: 4px;">
				<a href="editproduct.php?id=<?php echo $product['linkName']; ?>" class="btn btn-default btn-sm"
					style="background-color:#006699; color:white; border-color:#006699">
          		<span class="glyphicon glyphicon-edit"></span> Edit</a></td>
			<!--creates a link which allows admin to delete the product-->
			<td align="center" style="padding-top: 4px; padding-bottom: 4px;">
				<a href="deleteproduct.php?id=<?php echo $product['linkName']; ?>" class="btn btn-default btn-sm"
					style="background-color:#990000; color:white; border-color:#990000">
          		<span class="glyphicon glyphicon-trash"></span> Delete</a></td>
			</tr>
		<?php endforeach; ?></p>
	</tbody>
	</table><br><br>

</div>
</body>
</html>
