<div class="content">
    <h2>Каталог товаров</h2>

    <?php foreach ($products as $key => $product) : ?>
        <div class="catalog-product">
            <a href="?page=product&id=<?= $product['id'] ?>">
                <img src="<?= $product['path_small'] ?>" alt="<?= $product['title'] ?>">
            </a><br>
            <?= $product['title'] ?>
        </div>
    <?php endforeach; ?>

    <?php if ($_SESSION['login'] == 'admin') : ?>
        <a href="index.php?page=admin" class="button">Админка</a>
    <?php endif; ?>
</div>