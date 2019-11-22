<?php
require_once('templates/header.php');
require_once('engine/functions.php');

if ($_GET['page'] == 'contacts') require_once('templates/contacts.php');

elseif ($_GET['page'] == 'catalog') {
  $query = "SELECT * FROM `products`";
  $products = query($connection, $query);
  require_once('templates/catalog.php');
} elseif ($_GET['page'] == 'admin') {
  require_once('templates/admin.php');
} elseif ($_GET['page'] == 'product') {
  $query = "SELECT * FROM `products` WHERE `id` = '" . $_GET['id'] . "'";
  extract(query($connection, $query)[0]);
  require_once('templates/product.php');
} else
  require_once('templates/home.php');

require_once('templates/footer.php');
