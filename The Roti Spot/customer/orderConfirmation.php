<?php session_start();
include 'customerheader.php';
      include '../databaseConnect.php';
    	global $db;
        //get tables for orders
        $queryOrders = "SELECT *
                         FROM orders INNER JOIN orderitems ON (orders.order_ID=orderitems.order_ID) INNER JOIN customer ON (orders.cust_id=customer.cust_id) INNER JOIN product ON (orderitems.pro_ID=product.pro_ID) WHERE orders.order_ID =".$_SESSION['order_ID'];
        $result = $db->prepare($queryOrders);
        $result->execute();
        $orders = $result->fetchAll();
        $result->closeCursor();?>
  <main>
    <div class="container-fluid" style = "background-color: #ffc878;">
      <h1>Order Status</h1>
      <p>Your order has been submitted successfully.</p>
      <p>Here is your receipt: </p>
      <?php foreach ($orders as $i => $order) : ?>
          <?php if (($orders[$i] > 0) && ($orders[$i]['order_ID'] === $orders[$i-1]['order_ID'])){ ?>
            <p><?php echo " "; ?></p>
          <?php } else{ ?>
            <p>Time Placed : <?php echo $orders[$i]['order_Date']; ?></p>
            <p>Name: <?php echo $orders[$i]['cust_FName']; ?> <?php echo $orders[$i]['cust_LName']; ?></p>
            <p>Total Bill: <?php echo $orders[$i]['order_TotalPrice']; ?></p>
            <p>Items Ordered: </p>
            <?php } ?>
        <p>&emsp; Name: <?php echo $orders[$i]['pro_Name']; ?> Quantity: <?php echo $orders[$i]['item_Quantity']; ?> Price:  <?php echo $orders[$i]['pro_Price']; ?></p>
      <?php endforeach; ?></p>
      <p>Thanks for choosing to eat with us today!</p>
    </div>
  </body>
</html>
