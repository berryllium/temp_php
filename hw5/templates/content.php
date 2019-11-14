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
        <?php endwhile;
        else : ?>
        <div class="gallery">
            <?php
                $query = 'SELECT * FROM images';
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="item">
                    <a class="example-image-link" href="index.php?id=<?= $row['id'] ?>" data-lightbox="example-set">
                        <img class="example-image" src="<?= $row['path_small'] ?>" alt="<?= $row['title'] ?>" />
                    </a>
                    <div class="view">Просмотров: <?= $row['rating'] ?></div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="form">
            <form action="engine/get_photo.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" id="photo" accept="image/jpeg">
                <input type="submit" value="Загрузить">
            </form>
        </div>
    <?php endif; ?>
</main>