<?php
define('HOST', 'localhost');
define('DB', 'lesson6');
define('LOGIN', 'root');
define('PASSWORD', '');

$connection = mysqli_connect(HOST,LOGIN,PASSWORD,DB) or die ('Ошибка подлючения к БД');
