<?php
session_start();
class Register{
    function check(){
        if ($_SESSION['user']) {
            header('Location: profile.php');
        }
    }
}
$REGISTER = new Register();
$REGISTER -> check();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ПІБ</label>
        <input type="text" name="full_name" placeholder="Введіть своє повне ім'я">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть свій логін">
        <label>Пошта</label>
        <input type="email" name="email" placeholder="Введіть адресу своєї пошти">
        <label>Зображення профілю</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <label>Підтвердження пароля</label>
        <input type="password" name="password_confirm" placeholder="Підтвердіть пароль">
        <button type="submit">Зареєструватися</button>
        <p>
            У вас вже є аккаунт? - <a href="index.php">авторизуйтесь</a>!
        </p>
        <p>Бажаєте повернутися на головну? - <a href="index.html">на головну</a>!</p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>