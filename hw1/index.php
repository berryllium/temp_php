<?php

header('Content-Type: text/html; charset=utf-8');

// задание 3
echo 'task #3<br>';

$a = 5;
$b = '05';

echo 'var_dump($a == $b) = ';
var_dump($a == $b); 
echo ', т.к. используемый оператор == приведет оба типа к числу и сравнит 5 и 5<br>';

echo 'var_dump($a == $b) = ';
var_dump((int)'012345');
echo ', т.к. конструкция (int) приводит операнд к числу 12345<br>';

echo 'var_dump($a == $b) = ';
var_dump((float)123.0 === (int)123.0);
echo ', т.к. оператор === учитывает и типы данных при сравнении, а (int) даст 123<br>';

echo 'var_dump($a == $b) = ';
var_dump((int)0 === (int)'hello, world');
echo ', т.к. (int) попытается привести строку к числу и выдаст 0<br>';

// задание 4
echo '<br><hr><br>task #4<br>';
echo 'Вывод сайта Minimalistica <a href="minimalistica">по ссылке</a>';

// задание 5
echo '<br><hr><br>task #5<br>';

$a = 1;
$b = 2;
echo "исходные данные: a = $a, b = $b<br>";
$b = $a + $b;
$a = $b - $a;
$b = $b - $a;
echo ' код:
$b = $a + $b;
$a = $b - $a;
$b = $b - $a;
';
echo "<br> результат: a = $a, b = $b<br><hr>";
