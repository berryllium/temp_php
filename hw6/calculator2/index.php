<style>
  form {
    display: flex;
  }
  input,
  select {
    width: 40px;
    height: 20px;
  }
</style>

<?php
$a = 0;
$b = 0;
$operator = 'plus';
$result = '';

if (isset($_GET)) extract($_GET);

if ($plus) $result = $a + $b;
elseif ($sub) $result = $a - $b;
elseif ($mult) $result = $a * $b;
elseif ($div) $result = $a / $b;
else die('Ошибка вычислений');
?>

<form>
  <input type="text" name="a" value="<?= $a ?>" width="20" required>
  <input type="submit" name="plus" formaction="index.php?" value="+"></p>
  <input type="submit" name="sub" formaction="index.php?" value="-"></p>
  <input type="submit" name="mult" formaction="index.php?" value="*"></p>
  <input type="submit" name="div" formaction="index.php?" value="/"></p>
  <input type="text" name="b" value="<?= $b ?>" required>
  <span><?= $result; ?></span>
</form>