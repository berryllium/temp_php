<?php
header('Content-Type: text/html; charset= utf-8');

if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
}
// задание 1
function task1($a, $b)
{
  if ($a >= 0 && $b >= 0) {
    return $a - $b;
  } elseif ($a < 0 && $b < 0) {
    return $a * $b;
  } elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
    return $a + $b;
  } else {
    return 'операнды должны быть числами';
  }
}

// задание 2

function task2($a)
{
  $str = '';
  switch ($a) {
    case 0: {
        $str .= $a++ . ', ';
      }
    case 1: {
        $str .= $a++ . ', ';
      }
    case 2: {
        $str .= $a++ . ', ';
      }
    case 3: {
        $str .= $a++ . ', ';
      }
    case 4: {
        $str .= $a++ . ', ';
      }
    case 5: {
        $str .= $a++ . ', ';
      }
    case 6: {
        $str .= $a++ . ', ';
      }
    case 7: {
        $str .= $a++ . ', ';
      }
    case 8: {
        $str .= $a++ . ', ';
      }
    case 9: {
        $str .= $a++ . ', ';
      }
    case 10: {
        $str .= $a++ . ', ';
      }
    case 11: {
        $str .= $a++ . ', ';
      }
    case 12: {
        $str .= $a++ . ', ';
      }
    case 13: {
        $str .= $a++ . ', ';
      }
    case 14: {
        $str .= $a++ . ', ';
      }
    case 15: {
        $str .= $a++;
        break;
      }
    default: {
        $str = 'Число должно быть в диапазоне от 0 до 15!';
      }
  }
  return $str;
}

// задания 3 и 4

function sum($a, $b)
{
  return $a + $b;
}
function sub($a, $b)
{
  return $a - $b;
}
function mult($a, $b)
{
  return $a * $b;
}
function div($a, $b)
{
  return $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
  switch ($operation) {
    case 'plus': {
        return sum($arg1, $arg2);
        break;
      }
    case 'sub': {
        return sub($arg1, $arg2);
        break;
      }
    case 'mult': {
        return mult($arg1, $arg2);
        break;
      }
    case 'div': {
        return div($arg1, $arg2);
        break;
      }
    default: {
        return 'Оператор не получен';
        break;
      }
  }
}

// задание 6
function power($val, $pow)
{
  if ($val == 0) {
    return 0;
  }
  if ($pow == 0) {
    return 1;
  } elseif ($pow == 1) {
    return $val;
  } elseif ($pow == -1) {
    return 1 / $val;
  } elseif ($pow > 0) {
    return power($val, $pow - 1) * $val;
  } elseif ($pow < 0) {
    $pow = -$pow;
    $val = 1 / $val;
    return power($val, $pow - 1) * $val;
  } else 'Ошибка вычислений';
}

//узнаем дату с окончанием

function getTime()
{
  $h = date('H');
  $m = date('i');
  $h_end = 'ов';
  $m_end = '';

  $h_arr = str_split($h);
  $h1 = $h_arr[0];
  $h2 = $h_arr[1];

  if (($h1 == 0) || ($h1 == 2)) {
    if ($h2 == 1) $h_end = '';
    elseif (($h2 > 0) && ($h2 <= 4)) $h_end = 'а';
  }

  $m_arr = str_split($m);
  $m1 = $m_arr[0];
  $m2 = $m_arr[1];
  $m3 = $m_arr[2];

  if (($m1 == 0) || ($m1 > 1)) {
    if ($m2 == 1) $m_end = 'а';
    elseif (($m2 > 0) && ($m2 <= 4)) $m_end = 'ы';
  }

  return "$h час$h_end $m минут$m_end";
}

// отдаем результат на страничку
switch ($id) {
  case 1: {
      if (isset($_GET['a']) && isset($_GET['b'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        echo 'Результат: <b>' . task1($a, $b) . '<b>';
        break;
      }
    }
  case 2: {
      if (isset($_GET['a'])) {
        $a = $_GET['a'];
        echo 'Результат: <b>' . task2($a) . '<b>';
        break;
      }
    }
  case 3: {
      if (isset($_GET['a']) && isset($_GET['op']) && isset($_GET['b'])) {
        $arg1 = $_GET['a'];
        $arg2 = $_GET['b'];
        $operation = $_GET['op'];
        echo 'Результат: <b>' . mathOperation($arg1, $arg2, $operation) . '<b>';
        break;
      }
    }
  case 6: {
      if (isset($_GET['val']) && isset($_GET['pow'])) {
        $val = $_GET['val'];
        $pow = $_GET['pow'];
        echo 'Результат: <b>' . power($val, $pow) . '<b>';
        break;
      }
    }
  case 7: {
      echo 'Сейчас <b>' . getTime() . '<b>';
      break;
    }
  default: {
      echo 'error';
    }
}
