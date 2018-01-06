<?php
include 'managerheader.php';

  include '../dbh.php';
  global $db;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $category_id = mysqli_real_escape_string($db, $_POST['category_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['name']);
    $product_price = mysqli_real_escape_string($db, $_POST['price']);
    $image_name = mysqli_real_escape_string($db, $_POST['image']);
    $product_quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $description = mysqli_real_escape_string($db, $_POST['description']);

    $bool = true;

    
    $query = mysqli_query($db, "SELECT * FROM product");

    
    while($row = mysqli_fetch_array($query))
    {
      
      $table_products = $row['pro_Name'];

      if($product_name == $table_products)
      {
        $bool = false;

        print '<script>alert("Product already exists!");</script>';
        print '<script>window.location.assign("addproduct.php");</script>';
      }

    }
    if($bool)
    {
      mysqli_query($db, "INSERT INTO product (pro_Category, pro_Name, pro_Price, linkName, pro_Quantity, pro_Description)
        VALUES ('$category_id', '$product_name', '$product_price', '$image_name', '$product_quantity', '$description')");
      print '<script>alert("Successfully added product!");</script>';
    }
  }
?>
<link rel="stylesheet" type="text/css" href="../modifyStyle.css">
    <main>
        <div class="container-fluid" style = "background-color: #ffc878;">
      <h3 align="center">Product Addition Confirmation</h3>
      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Category ID:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $category_id; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Product Name:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_name; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Product Price:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_price; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Product Quantity:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_quantity; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Image Name:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $image_name; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px; background-color: coral;">Product Description:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $description; ?></div>
        </div>
      </div>
    </main>
    </div>
  </body>
</main>
</html>
