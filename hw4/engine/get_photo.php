<?php
function imageresize($outfile,$infile,$neww,$newh,$quality) {
    $im=imagecreatefromjpeg($infile);
    $k1=$neww/imagesx($im);
    $k2=$newh/imagesy($im);
    $k=$k1>$k2?$k2:$k1;

    $w=intval(imagesx($im)*$k);
    $h=intval(imagesy($im)*$k);

    $im1=imagecreatetruecolor($w,$h);
    imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }


$mas = ['image/jpeg','image/png','image/gif'];
$photo = $_FILES['photo'];
$path_big = '../data/images/big/';
$path_small = '../data/images/small/';
if(in_array($photo['type'], $mas)) {
    if (move_uploaded_file($photo['tmp_name'],$path_big.$photo['name'])) {
        imageresize($path_small.$photo['name'],$path_big.$photo['name'],320,320,75);
        header("Location: /hw4/index.php");
    }
}
else echo 'Можно загрузить только изображения в формате .jpg, .png или .gif';

