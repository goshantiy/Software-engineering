<?php
//Запускаем сессию
    session_start(); 
    unset($_SESSION['user_id']);
    unset($_SESSION['role']);
    unset($_SESSION["login"]);
    header('Location:/created/auth.php');
?>