<?php include 'customerheader.php';
      include 'categoryfunctions.php';
      //query to get products
    $pID = $_GET['id'];
    $queryProduct = "SELECT *
                     FROM product
                     WHERE linkName = '$pID'";
    $result = $db->prepare($queryProduct);
    $result->execute();
    $products = $result->fetchAll();
    $result->closeCursor();
?>

<?php foreach ($products as $product) : ?>
  <div class="container-fluid" style="padding-left: 60px; padding-right: 60px; padding-top: 30px; background-color: #ffc878;">
    <div class="col-sm-6 col-md-6">
      <img src="../images/<?php echo $product['linkName'].'.png'; ?>"
           alt="../images/<?php echo $product['linkName'].'.png'; ?>"
           width="550px"/>
    </div>
    <div class="col-sm-4 col-md-6">
      <h1><?php echo htmlspecialchars($product['pro_Name']); ?></h1><br /><br />
        <form action="shopCartAction.php?action=addToCart&id=<?php echo $product['pro_ID']; ?>"
              method="get" id="add_to_cart_form">
          <table class="table">
            <tbody>
              <tr>
                <td><br />
                  <b>Price:</b>
                  <span class="price">
                    <?php echo '$' . $product['pro_Price']; ?>
                  </span>
                </td>
                <td><br />
                  <input type="hidden" name="action" value="addToCart" />
                </td>
                <td><br />
                  <input type="hidden" name="id"
                         value="<?php echo $product['pro_ID']; ?>" />
                </td>
                <td><br />
                <!--Display quantity box-->
                  <b>Quantity:</b>&nbsp;
                  <input type="text" name="quantity" value="1" size="2" class="quantityBox" />
                </td>
                <td><br />
                  <input type="hidden" name="price" value="<?php echo $product['pro_Price']; ?>" />
                </td>
                <td><br />
                  <button type="submit" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-shopping-cart"
                          aria-hidden="true"></span> Add to Cart
                  </button>
                </td>
              </tr>
            <tbody>
          </table>
        </form>
        <h2>Description</h2>
          <p>
            <?php echo $product['pro_Description'] ?>
          </p>
            <?php endforeach; ?>
    </div>
  </div>
</html>
