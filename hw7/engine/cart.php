<?php
require_once('functions.php');
if(isset($_POST)) {
  $id = $_POST['id'];
  if (isset($_POST['quantity'])) {
    $quontity = $_POST['quantity'];
    addToCart($connection, $id);
  } else removeFromCart($connection, $id);
}

function removeFromCart($connection, $id) {
  $query = "DELETE FROM `cart` WHERE `id_product` = '$id'";
  mysqli_query($connection, $query);
  echo 1;
}

function addToCart($connection, $id) {
  $query = "INSERT INTO `cart` (`id_product`, `count`) VALUES ('$id', '1')";
  mysqli_query($connection, $query);
  echo 1;
}