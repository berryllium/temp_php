<?php
session_start();
require_once('functions.php');
$login = $_SESSION['login'];

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  if (isset($_POST['quantity'])) {
    addToCart($connection, $id, $login);
  } else removeFromCart($connection, $id, $login);
}

if(isset($_POST['login'])) {
  $login = $_POST['login'];
  $cart = json_encode(getUserCart($connection, $login));
  $query = "INSERT INTO `orders` (`login`, `cart`) VALUES ('$login', '$cart')";
  mysqli_query($connection, $query);
  cleanUserCart($connection, $login);
  echo "заказ $login оформлен";
}

function removeFromCart($connection, $id, $login) {
  $cart = getUserCart($connection, $login);
  if($cart->$id > 1) $cart->$id --;
  else unset($cart->$id);
  $cart = json_encode($cart);
  $query = "UPDATE `users` SET `cart` = '$cart' WHERE `login` = '$login'";  
  mysqli_query($connection, $query);
}

function addToCart($connection, $id, $login) {
  echo $_SESSION['login'];
  $cart = getUserCart($connection, $login);
  if(isset($cart->$id)) $cart->$id ++;
  else $cart->$id = 1;
  $cart = json_encode($cart);
  $query = "UPDATE `users` SET `cart` = '$cart' WHERE `login` = '$login'";
  mysqli_query($connection, $query);
}

function getUserCart($connection, $login) {
  $query = "SELECT `cart` FROM `users` WHERE `login` = '$login'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $data = $row['cart'];
  return json_decode($data);
}

function cleanUserCart($connection, $login) {
  $query = "UPDATE `users` SET `cart` = '{}' WHERE `login` = '$login'";
  mysqli_query($connection, $query);
}