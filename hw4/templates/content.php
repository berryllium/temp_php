<main>
    <div class="gallery">
        <?php

$path_big = $path . 'data/images/big/';
$path_small = $path . 'data/images/small/';

$images = array_slice(scandir($path_small), 2);
for ($i = 0; $i < count($images); $i++) {
    echo '<a class="example-image-link"
                 href="' . $path_big . $images[$i] . '"
                 data-lightbox="example-set">
                <img class="example-image"
                src="' . $path_small . $images[$i] . '" alt="small" />
            </a>';
}

?>


    </div>
    <div class="form">
        <form action="engine/get_photo.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="photo" id="photo" accept="image/jpeg">
            <input type="submit" value="Загрузить">
        </form>
    </div>
</main>