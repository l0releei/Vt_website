<?php
session_start();
class Logout{

    /**
     *
     */
    function clear(){
        unset($_SESSION['user']);
        header('Location: ../index.php');
    }
}

$LOGOUT = new Logout();
$LOGOUT -> clear();