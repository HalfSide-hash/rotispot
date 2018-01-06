<?php session_start();
class shopCart{
    protected $itemsInCart = array();
    public function __construct()
    {
      $this->itemsInCart = !empty($_SESSION['itemsInCart'])?$_SESSION['itemsInCart']:NULL;
      if($this->itemsInCart === null)
      {
        $this->itemsInCart = array('shopCartTotal' => 0, 'totalCartItems' => 0);
      }
    }

    public function shopCartContents()
    {
      $cart= array_reverse($this->itemsInCart);
      unset($cart['totalCartItems']);
      unset($cart['shopCartTotal']);
      return $cart;
     }

    public function totalCartItems()
    {
      return $this->itemsInCart['totalCartItems'];
    }

    public function shopCartPrice()
    {
      return $this->itemsInCart['shopCartTotal'];
    }

    public function insert($item = array())
    {
        if(!is_array($item) OR count($item) === 0)
        {
          return FALSE;
        }
        else
        {
          if(!isset($item['id'], $item['name'], $item['price'], $item['qty']))
          {
            return FALSE;
          }
          else
          {
              $item['qty'] = (float) $item['qty'];
              if($item['qty'] == 0)
              {
                 return FALSE;
              }
              $item['price'] = (float) $item['price'];
              $productID = md5($item['id']);
              $previousQuantity = isset($this->itemsInCart[$productID]['qty']) ? (int)
                      $this->itemsInCart[$productID]['qty'] : 0;
              $item['productID'] = $productID;
              $item['qty'] += $previousQuantity;
              $this->itemsInCart[$productID] = $item;
              if($this->saveshopCart())
              {
                  return isset($productID) ? $productID : TRUE;
              }
              else
              {
                  return FALSE;
              }
          }
        }
    }
     public function update($item = array())
     {
        if(!is_array($item) OR count($item) === 0)
        {
          return FLASE;
        }
        else
        {
          if(!isset($item['productID'], $this->itemsInCart[$item['productID']]))
          {
            return FALSE;
          }
          else
          {
            if(isset($item['qty']))
            {
              $item['qty'] = (float) $item['qty'];
              if($item['qty'] == 0)
              {
                unset($this->itemsInCart[$item['productID']]);
                return TRUE;
              }
            }
            $keys = array_intersect(array_keys($this->itemsInCart[$item['productID']]), array_keys($item));
            if(isset($item['price']))
            {
              $item['price'] = (float) $item['price'];
            }
            foreach($keys as $key)
            {
              $this->itemsInCart[$item['productID']][$key] = $item[$key];
            }
            $this->saveshopCart();
            return TRUE;
          }
        }
     }

      protected function saveshopCart()
      {
          $this->itemsInCart['totalCartItems'] = $this->itemsInCart['shopCartTotal'] = 0;
          foreach($this->itemsInCart as $key => $product)
          {
            //check the array items 
            if(!is_array($product) OR !isset($product['price'], $product['qty']))
            {
              continue;
            }
            $this->itemsInCart['shopCartTotal'] += ($product['price'] * $product['qty']);
            $this->itemsInCart['totalCartItems'] += $product['qty'];
            $this->itemsInCart[$key]['subtotal'] = ($this->itemsInCart[$key]['price'] * $this->itemsInCart[$key]['qty']);
          }

          if(count($this->itemsInCart) <= 2)
          {
            unset($_SESSION['itemsInCart']);
            return FALSE;
          }
          else
          {
            $_SESSION['itemsInCart'] = $this->itemsInCart;
            return TRUE;
          }
      }

     public function remove($product_ID)
     {
        unset($this->itemsInCart[$product_ID]);
        $this->saveshopCart();
        return TRUE;
     }

    public function destroy()
    {
        $this->itemsInCart = array('shopCartTotal' => 0, 'totalCartItems' => 0);
        unset($_SESSION['itemsInCart']);
    }
}
?>