<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизація та реєстрація</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть свій логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <button type="submit">Увійти</button>
        <p>
            У вас немає аккаунту? - <a href="register.php">зареєструйтеся</a>!
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