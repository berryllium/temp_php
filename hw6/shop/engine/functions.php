<?php
require_once('connection.php');
function query($connection, $query)
{
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    if($arr) return $arr;
    else return 'пустой ответ';
}
