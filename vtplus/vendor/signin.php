<?php

session_start();
require_once 'connect.php';
class Sign_in{
    /**
     * @param $check_user
     */
    function check_registration($check_user){
        if (mysqli_num_rows($check_user) > 0) {

            $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "id" => $user['id'],
                "full_name" => $user['full_name'],
                "avatar" => $user['avatar'],
                "email" => $user['email']
            ];

            header('Location: ../profile.php');

        } else {
            $_SESSION['message'] = 'Неправильний логін або пароль';
            header('Location: ../index.php');
        }
    }
}
$login = $_POST['login'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$SIGNIN = new Sign_in();
$SIGNIN -> check_registration($check_user);
?>
