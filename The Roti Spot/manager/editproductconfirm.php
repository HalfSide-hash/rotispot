<?php
 include 'managerheader.php';
  include '../databaseConnect.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productID = $_GET['id'];
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare("UPDATE product SET pro_Category=:category_id, pro_Name=:name, pro_Price=:price,
            pro_Quantity=:quantity, linkName=:fileToUpload, pro_Description=:description WHERE linkName='$productID'");
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':name', $product_name);
    $stmt->bindParam(':price', $product_price);
    $stmt->bindParam(':quantity', $product_quantity);
    $stmt->bindParam(':fileToUpload', $image_name);
    $stmt->bindParam(':description', $product_description);
    $category_id = $_POST['category_id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = $_POST['quantity'];
    $image_name = $_POST['fileToUpload']; 
    $product_description = $_POST['description'];
    $stmt->execute();
    print '<script>alert("Successfully edited product!");</script>';
  }
?>
<link rel="stylesheet" type="text/css" href="../modifyStyle.css">
<div class="container-fluid" style = "background-color: #ffc878;">
    <main>
      <h3 align="center">Product Edit Confirmation</h3>
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
        <div class="panel panel-default" style="width:40%; ">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; background-color: coral; font-size:18px;">Product Description:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_description; ?></div>
        </div>
      </div>
</div>
<p><center><a href = "productlist.php">Return to Product List</a></center></p>
    </main>
  </body>
</main>
</html>
