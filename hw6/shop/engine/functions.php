<?php
require_once('connection.php');
define('PATH_ROOT', '../');

function translit($str)
{
    $arr = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => '', ' ' => '_'];
    preg_match_all('/./u', $str, $matches);
    $str = $matches[0];
    $result = [];

    foreach ($str as $symbol) {
        foreach ($arr as $t_symbol => $value) {
            if ($t_symbol == $symbol) $symbol = $value;
        }
        $result[] = $symbol;
    }
    $result = implode($result);
    return $result;
}

// создание уменьшенной копии
function imageresize($outfile, $infile, $neww, $newh, $quality)
{
    $im = imagecreatefromjpeg($infile);
    $k1 = $neww / imagesx($im);
    $k2 = $newh / imagesy($im);
    $k = $k1 > $k2 ? $k2 : $k1;

    $w = intval(imagesx($im) * $k);
    $h = intval(imagesy($im) * $k);

    $im1 = imagecreatetruecolor($w, $h);
    imagecopyresampled($im1, $im, 0, 0, 0, 0, $w, $h, imagesx($im), imagesy($im));

    imagejpeg($im1, $outfile, $quality);
    imagedestroy($im);
    imagedestroy($im1);
}

function query($connection, $query)
{
    $query = (string) htmlspecialchars(strip_tags($query));
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    if ($arr) return $arr;
    else return 'пустой ответ';
}

function addProduct($connection, $product)
{
    print_r($product);
    extract($product);
    $query = "INSERT INTO `products` (`title`, `category`, `short_desc`, `full_desc`, `price`, `complect`, `path_big`, `path_small`) VALUES ('$title', '$category', '$short_desc', '$full_desc', '$price', '$complect', '$path_big', '$path_small');";
    $query = (string) htmlspecialchars(strip_tags($query));
    echo "<br>$query<br>";
    $result = mysqli_query($connection, $query);
    echo $result ? 'запись добавлена' : 'ошибка обращение к БД '.mysqli_error($connection);
}

function updateProduct($connection, $product)
{
    extract($product);
    if ($path_big) $query = "UPDATE `products` SET `title` = '$title', `category` = '$category', `short_desc` = '$short_desc', `full_desc` = '$full_desc', `price` = '$price', `complect` = '$complect', `path_big` = '$path_big', `path_small` = '$path_small' WHERE `id` = '$id';";
    else $query = "UPDATE `products` SET `title` = '$title', `category` = '$category', `short_desc` = '$short_desc', `full_desc` = '$full_desc', `price` = '$price', `complect` = '$complect'  WHERE `id` = '$id';";
    $query = (string) htmlspecialchars(strip_tags($query));
    $result = mysqli_query($connection, $query);
    echo $result ? 'запись обновлена' : 'ошибка обращение к БД '.mysqli_error($connection);    
}

function removeProduct($connection, $id)
{
    $query = "DELETE FROM `products` WHERE `id` = '$id';";
    $small = PATH_ROOT . $_GET['small'];
    $big = PATH_ROOT . $_GET['big'];
    if (file_exists($small)) unlink($small);
    if (file_exists($big)) unlink($big);
    $query = (string) htmlspecialchars(strip_tags($query));
    $result = mysqli_query($connection, $query);
    echo $result ? 'запись удалина' : 'ошибка обращение к БД';
}
