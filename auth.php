<?php
include 'bdconnect.php';
if ( !session_id() )
session_start();
if(isset($_SESSION['role']))
{
    header('Location:/index.php');
    exit();
}
if (isset($_POST['btn_login_form'])) {
    if (trim($_POST['form-login-name']) == '') {
        $errors[] = "Введите логин!";
    }
    if (trim($_POST['form-password']) == '') {
        $errors[] = "Введите пароль!";
    }
    if (trim($_POST['captcha']) != '') {
        $captcha = trim($_POST['captcha']);
        if (($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")) {
            $errors[] = "Вы ввели неправильную капчу";
        }
    } else {
        $errors[] = "Поле для ввода капчи не должно быть пустым";
    }
    if (empty($errors)) {
        // экранирования символов для mysql
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
        $login = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['form-login-name'])));
        $password = $_POST['form-password'];
        $query = "SELECT * FROM user WHERE `user_login`='$login'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        $res = mysqli_fetch_assoc($result);
        if (password_verify($password,$res['password'])) {
            $_SESSION['user_id'] = $res['user_id'];
            $_SESSION['role'] = $res['role'];
            $_SESSION['login'] = $login;
            header('Location:/index.php');
            exit();
        } else {
            $errors[] = "Неправильный логин или пароль";
        }
    }
    if(!empty($errors))
    echo '<div style="color: red; display:flex; justify-content: center; ">' . array_shift($errors) . '</div><hr>';
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/reg.css" type="text/css">
        <title>Вход</title>

    </head>
    <body>
        <div class="container positioner">
            <div class="positioner-inside">
            <h1 class="center">Authorization</h1>
            <h3 class="center">Enter your information</h3>
            <form class = center action="auth.php" class="row"  method="POST">
                <div class = left>
                    <div class="col-6 form-group">
                        <p class=form-login>Login:</p>
                        <input type="text" id="form-login-name" name="form-login-name" value="" class="form-control" placeholder="User" required/>
                    </div>
                    <div class="col-6 form-group">
                        <p class=form-password>Password:</p>
                        <input type="password" id="form-password" name="form-password" value="" class="form-control" required/>
                    </div>
                    <div class="col-6 form-group">
                        <p class=form-password>Captcha:</p>
                        <div class=center> <img src="captcha.php"/></div>  
                        <input class="center" type="text" id="captcha" name="captcha" placeholder="Captcha" class="form-control" required/>
                    </div>   
                    <div class=" center form-group">
                        <button class="btn btn-dark m-0" id="btn_login_form" name="btn_login_form" value="Login">Вход</button>
                    </div>
                </div>                
            </form>  
            <p class="center">Not registered yet?<a href=/login-register.php>Registration</a></p> 
        </div>
        </div>
    </body>
</html>
