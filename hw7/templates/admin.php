<h2> Добавление нового продукта </h2>
<form action="engine/crud.php" method="post" enctype="multipart/form-data" required >
  <label>Наименование</label><br><input type="text" name="title" required >
  <label>Категория</label><br><input type="text" name="category" required >
  <label>Цена</label><br><input type="text" name="price" required >
  <label>Комплект</label><br><input type="text" name="complect" required >
  <label>Краткое описание</label><br><input type="text" name="short" required >
  <label>Полное описание</label><br><textarea type="text" name="full" required></textarea>
  <input name = "photo" type="file" value="Фото" required >
  <input name = "action" type="hidden" value="create">
  <input type="submit" value="Добавить товар">
</form>

<style>
  form {
    display: flex;
    flex-direction: column;
    width: 500px;
    margin: 10px auto;
  }
</style>