<?php
if(isset($_POST['cart'])) {
  $cart = $_POST['cart'];
  extract ($cart);
  print_r($cart);
}