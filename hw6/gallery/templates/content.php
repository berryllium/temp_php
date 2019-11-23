<main>

    <?php
    require_once 'engine/connection.php';

    // вывод одиночного изображения и увеличение рейтинга
    if (isset($_GET['id'])) :
        $id = $_GET['id'];
        $query1 = "UPDATE `images` SET `rating` = `rating`+1 WHERE `images`.`id` = $id";
        $query2 = "SELECT * FROM images WHERE id=$id";
        $result = mysqli_query($connection, $query1);
        $result = mysqli_query($connection, $query2);
        $cur_img = mysqli_fetch_assoc($result);


        // вывод комментариев или добавление нового
        if (isset($_POST['comment'])) {
            $name = $_POST['comment_name'];
            $text = $_POST['comment_text'];
            $query = "INSERT INTO `comments` (`image_id`, `name`, `text`) VALUES ('$id', '$name', '$text');";
            $result = mysqli_query($connection, $query);
        }

        $query = "SELECT * FROM `comments` WHERE `image_id` = '$id'";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'text' => $row['text'],
                'date' => $row['date']
            ];
        }
        ?>



        <div class="single">
            <div class="text">
                <h1><?= $cur_img['title'] ?></h1>
                <h2 class="rating">Количество просмотров: <span><?= $cur_img['rating'] ?></span></h2>
            </div>
            <img height="70%" class="single-image" src="<?= $cur_img['path_big'] ?>" alt="<?= $cur_img['title'] ?>" />
        </div>

        <!-- А здесь мы выводим блок с комментариями -->
        <h3>Комментарии пользователей</h3>
        <form method="POST" id="comments">
            <label for="comment_name">Ваше имя</label><br><input type="text" name="comment_name" required><br>
            <label for="comment_text">Ваш комментарий</label><br><textarea name="comment_text"></textarea><br>
            <input type="submit" name="comment">
        </form>

        <div class="comments">
            <?php if ($comments) : foreach ($comments as $key => $value) : ?>

                    <h4><?= $value['name']; ?></h4>
                    <div class="time"><?= $value['date'] ?></div>
                    <div class="comment-text">
                        <?= $value['text']; ?>
                    </div>

            <?php endforeach;
                endif; ?>
        </div>

<!-- А здесь выводим всю галерею, если не выбрано конкретное изображение -->
    <?php else : ?>

        <div class="gallery">
            <?php
                $query = 'SELECT * FROM images';
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $arr_photo[] = [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'path_big' => $row['path_big'],
                        'path_small' => $row['path_small'],
                        'rating' => $row['rating']
                    ];
                }
                // сортировка по количеству просмотров
                usort($arr_photo,  function ($a, $b) {
                    if ($a['rating'] == $b['rating']) {
                        return 0;
                    }
                    return ($a['rating'] < $b['rating']) ? -1 : 1;
                });

                foreach ($arr_photo as $key => $img) : ?>
                <div class="item">
                    <a class="example-image-link" href="index.php?id=<?= $img['id'] ?>" data-lightbox="example-set">
                        <img class="example-image" src="<?= $img['path_small'] ?>" alt="<?= $img['title'] ?>" />
                    </a>
                    <div class="view">Просмотров: <?= $img['rating'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form">
            <form action="engine/get_photo.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" id="photo" accept="image/jpeg">
                <input type="submit" value="Загрузить">
            </form>
        </div>
    <?php endif; ?>
</main>