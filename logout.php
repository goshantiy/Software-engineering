<?php
//Запускаем сессию
    session_start(); 
    unset($_SESSION['user_id']);
    unset($_SESSION['role']);
    unset($_SESSION["login"]);
    unset($_SESSION["password"]);
    header('Location:/created/auth.php');
?>