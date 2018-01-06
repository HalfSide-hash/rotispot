<?php
include 'shopCart.php';
  include 'customerheader.php';
  $cart= new shopCart; ?>
    <main>
      <div class="container-fluid" style = "background-color: #ffc878;">
        <h1><center>Shopping Cart</center></h1>
        <table class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>

            <?php
              if($cart->totalCartItems() > 0)
              {
              $shopCartItems = $cart->shopCartContents();
              foreach($shopCartItems as $item){
            ?>
            <tr>
              <td><?php echo $item['name']; ?></td>
              <td><?php echo '$'.$item['price']; ?></td>
              <td>
                <input type="number" class="form-control text-center"
                value="<?php echo $item['qty']; ?>"
                onchange="updateShopCartItem(this, '<?php echo $item["productID"]; ?>')">
              </td>
              <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
              <td>
                <a href="shopCartAction.php?action=removeCartItem&id=<?php echo $item["productID"]; ?>"
                  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                  <i class="glyphicon glyphicon-trash"></i>
                </a>
              </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="5"><p>Your cart is currently empty. Select "Continue Shopping" to add items to your cart.</p></td>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
              <td>
                <a href="homepage.php" class="btn btn-warning">
                  <i class="glyphicon glyphicon-menu-left"></i> Continue Shopping
                </a>
              </td>
              <td colspan="2"></td>
              <?php if($cart->totalCartItems() > 0){ ?>
              <td class="text-center">
                <strong>Total <?php echo '$'.$cart->shopCartPrice(); ?></strong>
              </td>
              <td>
                <a href="checkout.php" class="btn btn-success btn-block">
                  Checkout <i class="glyphicon glyphicon-menu-right"></i>
                </a>
              </td>
              <?php } ?>
            </tr>
        </tfoot>
        </table>
      </div>
    </main>
    <!-- ALL HAIL THE MIGHTY JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    function updateShopCartItem(obj,id)
    {
        $.get("shopCartAction.php",{action:"updateShopCartItem", id:id, qty:obj.value},
        function(data){
            if(data == 'ok'){
                location.reload();
            }
            else{
                alert('Please try again.');
            }
        });
    }
    </script>
  </body>
</html>
