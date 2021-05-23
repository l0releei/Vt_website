<?php
session_start();
class Start_from_main{
    /**
     *
     */
    function backer(){
        if (!$_SESSION['user']) {
            header('Location: index.php');
        }
    }
}
$START = new Start_from_main;
$START -> backer();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизація и реєстрація</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- Профиль -->

    <form>
        <img style="border-radius: 50%; width:200px;" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
        <?php
        if (strlen($_SESSION['user']['avatar'])<=18) {
            echo '<img style="border-radius: 50%;" width="200" src="img/anon.png" alt="">';
        }
        ?>
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
        <p>Пошта:<a href="#"> <?= $_SESSION['user']['email'] ?></a></p>
        <p>Бажаєте повернутися на головну? - <a href="index.html">на головну</a>!</p>
        <p><a href="vendor/logout.php" class="logout" style="margin: 5px 0 0 0;">Вихід</a><p>
    </form>

</body>
</html>