<?php
session_start();
require_once('functions.php');
$login = $_SESSION['login'];

if(isset($_POST)) {
  $id = $_POST['id'];
  if (isset($_POST['quantity'])) {
    addToCart($connection, $id, $login);
  } else removeFromCart($connection, $id, $login);
}

function removeFromCart($connection, $id, $login) {
  $cart = getUserCart($connection, $login);
  if($cart->$id > 1) $cart->$id --;
  else unset($cart->$id);
  $cart = json_encode($cart);
  $query = "UPDATE `users` SET `cart` = '$cart' WHERE `login` = '$login'";  
  mysqli_query($connection, $query);
  echo $cart;
}

function addToCart($connection, $id, $login) {
  echo $_SESSION['login'];
  $cart = getUserCart($connection, $login);
  if(isset($cart->$id)) $cart->$id ++;
  else $cart->$id = 1;
  $cart = json_encode($cart);
  $query = "UPDATE `users` SET `cart` = '$cart' WHERE `login` = '$login'";
  mysqli_query($connection, $query);
  echo $cart;
}

function getUserCart($connection, $login) {
  $query = "SELECT `cart` FROM `users` WHERE `login` = '$login'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $data = $row['cart'];
  return json_decode($data);
}