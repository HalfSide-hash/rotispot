<?php
  include '../databaseConnect.php';
  global $db;
  $productID = $_GET['id'];
	$query = "SELECT * FROM product
              WHERE linkName = '$productID'";
  $statement = $db->prepare($query);
  $statement->execute();
  $products = $statement->fetchAll();
  $statement->closeCursor();
  //select from categories table to display in drop-down
  $queryAllCategories = 'SELECT * FROM category
                         ORDER BY pro_Category';
  $statement2 = $db->prepare($queryAllCategories);
  $statement2->execute();
  $categories = $statement2->fetchAll();
  $statement2->closeCursor();
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../modifyStyle.css">

    <main>
        <div class="container-fluid" style = "background-color: #ffc878;">
      <form method="POST" action="editproductconfirm.php?id=<?php echo $products[0]['linkName']; ?>"
            style="padding-left: 300px; padding-right: 300px">
      <h1>Edit Product </h1><br>
      <h3>Category:</h3>
      <select name="category_id" class="btn btn-primary dropdown-toggle"
              type="button" data-toggle="dropdown"
              style="background-color: #004080; font-size: 20px; border-color:#004080;">
     <?php foreach ($categories as $category) :
              if ($category['pro_Category'] == $products[0]['pro_Category']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
     ?>
      <option style="background-color:white; color:black;" value="<?php echo $category['pro_Category']; ?>"<?php echo $selected ?>>
       <?php echo htmlspecialchars($category['pro_Category']); ?>
      </option>
     <?php endforeach; ?>
     </select><br>
      <div class="form-group">
        <h3>Name:</h3>
        <input type="text" name="name" class="form-control"
              value="<?php echo $products[0]['pro_Name']; ?>" required><br>
      </div>
      <div class="form-group">
        <h3>Price:</h3>
        <input type="text" name="price" class="form-control" placeholder="0.00" pattern="^\d*(\.\d{2}$)?"
               value="<?php echo $products[0]['pro_Price']; ?>" required><br>
      </div>
      <div class="form-group">
        <h3>Image Filename:</h3>
	<input type="text" name="fileToUpload" class="form-control" value="<?php echo $products[0]['linkName']; ?>" required><br><br>
      </div>
      <div class="form-group">
        <h3>Quantity:</h3>
	<input type="text" name="quantity" class="form-control" value="<?php echo $products[0]['pro_Quantity']; ?>" required><br><br>
      </div>
      <div class="form-group">
	<h3>Description:</h3>
	<textarea rows="10" cols="50" name="description" class="form-control" required><?php echo $products[0]['pro_Description']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary"/>Submit</button>
      </div>
      </form><br>
      </main>
  </body>
</html>
