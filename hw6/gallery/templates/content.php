<main>

    <?php require_once 'engine/connection.php';
    if (isset($_GET['id'])) :
        $id = $_GET['id'];
        $query1 = "UPDATE `images` SET `rating` = `rating`+1 WHERE `images`.`id` = $id";
        $query2 = "SELECT * FROM images WHERE id=$id";
        $result = mysqli_query($connection, $query1);
        $result = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_assoc($result)) : ?>

            <div class="single">
                <div class="text">
                    <h1><?= $row['title'] ?></h1>
                    <h2 class="rating">Количество просмотров: <span><?= $row['rating'] ?></span></h2>
                </div>
                <img width="100%" class="single-image" src="<?= $row['path_big'] ?>" alt="<?= $row['title'] ?>" />
            </div>

<!-- А здесь мы выводим блок с комментариями -->



        <?php endwhile;
        else : ?>
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

                foreach ($arr_photo as $key=>$img) : ?>
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