<style>
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

if ($operator == 'plus') $result = $a + $b;
elseif ($operator == 'sub') $result = $a - $b;
elseif ($operator == 'mult') $result = $a * $b;
elseif ($operator == 'div') $result = $a / $b;
else die('Ошибка вычислений');
?>

<form>
  <input type="text" name="a" value="<?= $a ?>" width="20" required>
  <select name="operator" required>
    <option value="plus" <?= $operator=='plus'?'selected':'';?>>+</option>
    <option value="sub" <?= $operator=='sub'?'selected':'';?>>-</option>
    <option value="mult" <?= $operator=='mult'?'selected':'';?>>*</option>
    <option value="div" <?= $operator=='div'?'selected':'';?>>/</option>
  </select>
  <input type="text" name="b" value="<?= $b ?>" required>
  <input type="submit" value="=">
  <span><?= $result; ?></span>
</form>