<div class="content">
    <h2><?= $title ?></h2>
    <div class="mini">
        <a href="<?= $path_big ?>" target="_blank">
            <img class="mini" src="<?= $path_small ?>" alt="<?= $title ?>"></a>
        <a href="#" class="button">Купить</a>
    </div>
    <p class="short"><?= $short_desc ?></p>
    <h3>Характеристики товара</h3>
    <h3>Подробное описание</h3>
    <p class="more"><?= $full_desc ?></p>
    <h3>Комплектация товара</h3>
    <p class="complect"><?= $complect ?></p>
</div>



<h2> Редактирование товара </h2>
<a href="engine/crud?action=delete&id=<?= $id ?>" class="button">Удалить Товар</a>
<form action="engine/crud.php" method="post" enctype="multipart/form-data" required value="<?= $id ?>" >
    <label>Наименование</label><br><input type="text" name="title" required value="<?= $title ?>" >
    <label>Категория</label><br><input type="text" name="category" required value="<?= $category ?>">
    <label>Цена</label><br><input type="text" name="price" required value="<?= $price ?>">
    <label>Комплект</label><br><input type="text" name="complect" required value="<?= $complect ?>">
    <label>Краткое описание</label><br><input type="text" name="short" required value="<?= $short_desc ?>">
    <label>Полное описание</label><br><textarea type="text" name="full" required><?= $full_desc ?></textarea>
    <input name="photo" type="file" value="Фото">
    <input name="id" type="hidden" value="<?= $id ?>">
    <input name="action" type="hidden" value="update">
    <input type="submit" value="Изменить товар">
</form>

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 500px;
        margin: 10px auto;
    }
</style>