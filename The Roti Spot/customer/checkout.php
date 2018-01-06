<?php include 'shopCart.php';
//connect to database
include '../databaseConnect.php';
include 'customerheader.php';
$cart= new shopCart;
if($cart->totalCartItems() <= 0){
    header("Location: homepage.php");
}

//gets current session to confirm
$user = $_SESSION['user_name'];

$userQuery = $db->query("SELECT * FROM customer WHERE cust_UserName='$user'");
$row = $userQuery->fetch(PDO::FETCH_ASSOC);

//set proper id
$_SESSION['id'] = $row['cust_ID'];
$id = $_SESSION['id'];

//match it up to proper id
$query = $db->query("SELECT * FROM customer WHERE cust_ID = '$id'");
$Customer = $query->fetch(PDO::FETCH_ASSOC);

//display proper username
$_SESSION['firstname'] = $Customer['cust_FName'];
$_SESSION['lastname'] = $Customer['cust_LName'];

$query = $db->query("SELECT * FROM orders WHERE cust_ID = '$id'");
?>
<main>
  <div class="container-fluid" style = "background-color: #ffc878;">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->totalCartItems() > 0){
            //get items from session
            $shopCartItems = $cart->shopCartContents();
            foreach($shopCartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>Your cart is currently empty. Select "Continue Shopping" to add items to your cart.</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->totalCartItems() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->shopCartPrice(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
      <div class="row">
        <div class="col-sm-4 col-md-4">
        <h4>Name</h4>
        <?php if (isset($Customer)) :?>
        <p>
          <?php echo $Customer['cust_FName']; ?>
          <?php echo $Customer['cust_LName']; ?></p>
        <?php else: ?>
        <p style="color: #b30000">
          Nobody is listed here!
        </p>
        <?php endif; ?>
      </div>
    </div>
    <div class="footBtn">
        <a href="homepage.php" class="btn btn-warning">
          <i class="glyphicon glyphicon-menu-left"></i> Continue Shopping
        </a>
        <a href="shopCartAction.php?action=placeOrder" class="btn btn-success orderBtn">
          Place Order <i class="glyphicon glyphicon-menu-right"></i>
        </a>
    </div>
    </div>
</main><br>
</body>
</html>
