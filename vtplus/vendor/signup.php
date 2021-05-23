<?php

session_start();
require_once 'connect.php';
class Sign_up{
    /**
     * @param $password
     * @param $password_confirm
     * @param $full_name
     * @param $login
     * @param $email
     */
    function checker($password, $password_confirm, $full_name, $login, $email){
        if ($password === $password_confirm) {

            $path = 'uploads/' . time() . $_FILES['avatar']['name'];
            if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
                $_SESSION['message'] = 'Помилка при завантаженні повідомлення';
                header('Location: ../register.php');
            }

            $password = md5($password);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");

            $_SESSION['message'] = 'Реєстрація пройшла успішно!';
            header('Location: ../index.php');


        } else {
            $_SESSION['message'] = 'Паролі не співпадають';
            header('Location: ../register.php');
        }
    }
}
$SIGNUP = new Sign_up();
$SIGNUP -> checker($_POST['full_name'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['password_confirm']);

?>
