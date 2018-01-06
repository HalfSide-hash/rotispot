<?php
  include 'shopCart.php';
  $cart= new shopCart;
//connect to database
  include '../databaseConnect.php';
  if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
  {
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id']))
    {
      $productID = $_GET['id'];
      $productQuantity = filter_var( $_GET["quantity"], FILTER_VALIDATE_INT);
      $query = $db->query("SELECT * FROM product WHERE pro_ID = '$productID'");
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $itemData = array(
        'id' => $row['pro_ID'],
        'name' => $row['pro_Name'],
        'price' => $row['pro_Price'],
        'qty' => $productQuantity,
        'linkName' => $row['linkName']
      );
      if ($productQuantity <= $row['pro_Quantity']){
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'homepage.php'; //check this
        header("Location: " . $redirectLoc);
      }
      else {
        print '<script>alert("Please select a lower quantity!");</script>';
        print '<script>window.location.assign("productpage.php?id='.$row['linkName'].'");</script>';
        die;
      }
    }
    elseif($_REQUEST['action'] == 'updateShopCartItem' && !empty($_REQUEST['id']))
    {
      $itemData = array(
        'productID' => $_REQUEST['id'],
        'qty' => $_REQUEST['qty'],
      );
      $updateItem = $cart->update($itemData);
      echo $updateItem?'ok':'err';die;
    }
    elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id']))
    {
      $deleteItem = $cart->remove($_REQUEST['id']);
      header("Location: viewCart.php");
    }
    elseif($_REQUEST['action'] == 'placeOrder' && $cart->totalCartItems() > 0 && !empty($_SESSION['id']))
    {
      $insertOrder = $db->query("INSERT INTO
        orders (cust_ID, order_Quantity, order_TotalPrice, order_Date)
        VALUES ('".$_SESSION['id']."', '".$cart->totalCartItems()."', '".$cart->shopCartPrice()."',
        '".date("Y-m-d H:i:s")."')");
      if($insertOrder)
      {
        $orderID = $db->lastInsertId();;
        $_SESSION['order_ID'] = $orderID;
        $sql = '';
        $shopCartItems = $cart->shopCartContents();
        foreach ($shopCartItems as $item)
        {
          $sql .= "INSERT INTO orderitems (order_ID, pro_ID, item_Quantity)
                   VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";

          $updateStuff .= "UPDATE product SET pro_Quantity = pro_Quantity - ".$item['qty']."
                    WHERE pro_ID = ".$item['id'].";";
        }
        $insertOrderItems = $db->exec($sql);
        $updateMagic = $db->exec($updateStuff);
        if($updateMagic)
        {
          $cart->destroy();
          header("Location: orderConfirmation.php");
        }
        else
        {
          header("Location: checkout.php");
        }
      }
      else
      {
        header("Location: checkout.php");
      }
    }
    else
    {
      header("location: homepage.php");
    }
  }
  else
  {
    header("location: homepage.php");
  }
?>
