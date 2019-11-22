<?php
require_once 'engine/functions.php';
$sault = 'wtrw4q42';
if ($_POST['submit']) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM `users` WHERE login = '$user'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if ((md5($pass . $sault) == $row['pass']) && ($row['role'] == 'admin')) {
        $_SESSION['admin'] = $row['login'];
        echo 'вход выполнен';
        exit;
    } else {
        echo '<p>Логин или пароль неверны!</p>';
    }

}
if ($_GET['exit']) {
    unset($_SESSION['admin']);
    session_destroy();
}
if ($_SESSION['admin']) {
    echo 'вход выполнен';
    exit;
}

?>

<?php include_once 'header.php'?>
<div class="login-form">
  <form method="post">
    <label for="user">Логин: </label><input type="text" name="user" id="user" /><br />
    <label for="pass">Пароль: </label><input type="password" name="pass" id="pass" /><br />
    <input type="submit" name="submit" value="Войти" />
  </form>
</div>
<?php include_once 'footer.php'?>