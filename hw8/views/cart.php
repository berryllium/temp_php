<?php
$cart_poducts = [];
$query = "SELECT * FROM `cart`";
$arr = query($connection, $query);
foreach ($arr as $key => $value) {
  $id = $value['id_product'];
  $query = "SELECT * FROM `products` WHERE `id` = '$id'";
  $cart_poducts[] = query($connection, $query)[0];
}
foreach ($cart_poducts as $product) :
  ?>
  <div class="cart-item">
    <img src="<?= $product['path_small'] ?>" alt="photo">
    <div class="name"><?= $product['title'] ?></div>
    <a href="#" class="button" onclick="rem(event)" data-id="<?= $product['id'] ?>">Удалить</a>
  </div>
<?php endforeach; ?>

<script>
  function rem(event) {
    id = event.target.dataset.id
    $.post("model/cart.php", {
        id: id
      })
      .done(function(data) {
        alert("Ответ сервера: " + data);
      });
  }
</script>