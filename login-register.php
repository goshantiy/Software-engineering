<?php
include 'bdconnect.php';
if ( !session_id() )
session_start();
$form_status_register = "Не зарегистрованный пользователь!";
// Переменная для сбора данных с формы
$_POST = $_POST;
// Выполнения кода после активации кнопки "Зарегистрироваться" с формы
if (isset($_POST['btn_registr_form'])) {
    //Проверка данных формы
    if (trim($_POST['form-name']) == '') {
        $errors[] = "Введите ФИО пользователя!";
    }

    if (trim($_POST['form-login-name']) == '') {
        $errors[] = "Введите логин пользователя!";
    }
    if (trim($_POST['form-email']) == '') {
        $errors[] = "Введите E-mail пользователя!";
    }
    if ($_POST['formemailpass'] != $_POST['form-email']) {
        $errors[] = "Повторный email не совпадает!";
    }
    if ($_POST['form-password'] == '') {
        $errors[] = "Введите пароль пользователя!";
    }
    if ($_POST['form-password-pass'] != $_POST['form-password']) {
        $errors[] = "Повторный пароль не совпадает!";
    }

    // функция mb_strlen - получает длину строки
    // Если логин будет меньше 5 символов и больше 90, то выйдет ошибка
    if (mb_strlen($_POST['form-login-name']) < 5 || mb_strlen($_POST['form-login-name']) > 90) {
        $errors[] = "Недопустимая длина логина";
    }
    if (mb_strlen($_POST['form-password']) < 6 || mb_strlen($_POST['form-password']) > 64) {
        $errors[] = "Недопустимая длина пароля (от 6 до 64 символов)";
    }
    // проверка на правильность написания Email
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['form-email'])) {
        $errors[] = 'Неверно введен е-mail';
    }

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    // экранирования символов для mysql
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['form-name'])));
    $login = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['form-login-name'])));
    $password = password_hash($_POST['form-password'],PASSWORD_DEFAULT);
    $email = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['form-email'])));
    //$session_key = $sessionid;
    $query1 = "SELECT `user_login` FROM user WHERE `user_login`='$login'";
    $result1 = mysqli_query($link, $query1);
    if (mysqli_num_rows($result1) > 0) {
        $errors[] = "Этот логин занят!";
    }

    $query2 = "SELECT `user_email` FROM user WHERE `user_email`='$email'";
    $result2 = mysqli_query($link, $query2);
    if (mysqli_num_rows($result2) > 0) {
        $errors[] = "Этот email занят!";
    }
    if (empty($errors)) {
        // создание строки запроса
        $query = "INSERT INTO user(`user_id`, `user_login`, `user_email`, `user_name`, `password`, `role`) VALUES(NULL, '$login','$email','$name', '$password', 1)";

        // выполняем запрос
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            echo "<span style='color:green; display:flex; justify-content: center;'>Данные пользователя добавлены</span>";
        }


        // закрываем подключение
        mysqli_close($link);
    } else {
        // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
        echo '<div style="color: red; display:flex; justify-content: center; ">' . array_shift($errors) . '</div><hr>';
    }
}
?>
<head>
    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reg.css" type="text/css">
    <!-- Document Title
    ============================================= -->
    <title>Регистрация пользователя</title>

</head>

<body>
    <div class="container positioner">
        <h1 class="center">Registration</h1>
        <h3 class="center">Enter your information </h3>
        <div class="center">

        </div>

        <form class =center action="login-register.php" class="row"  method="POST">
            <div class="left">
                <div class="col-6 form-group">
                    <p>Full name:</p>
                    <input type="text" id="form-name" name="form-name" value="" class="form-control" placeholder="Иванов Иван Иванович" required/>
                </div>

                <div class="col-6 form-group">
                    <p>Mail:</p>
                    <input type="text" id="form-email" name="form-email" value="" class="form-control" placeholder="Example@mail.ru" required/>
                </div>

                <div class="col-6 form-group">
                    <p>Login:</p>
                    <input type="text" id="form-login-name" name="form-login-name" value="" class="form-control" placeholder="User" required/>
                </div>
            </div>
            <div class="right">
                <div class="col-6 form-group">
                    <p>Confirm mail:</p>
                    <input type="text" id="formemailpass" name="formemailpass" value="" class="form-control" placeholder="Example@mail.ru" required/>
                </div>


                <div class="col-6 form-group">
                    <p>Password:</p>
                    <input type="password" id="form-password" name="form-password" value="" class="form-control" required/>
                </div>

                <div class="col-6 form-group">
                    <p>Confirm password:</p>
                    <input type="password" id="form-password-pass" name="form-password-pass" value="" class="form-control" required />
                </div>
            </div>
            <div class="col-12 center">
                <button class="btn btn-dark m-0" id="btn_registr_form" name="btn_registr_form" value="register">Submit</button>
            </div>
        </form>		
        <p class=center>Already have account? <a href=/auth.php>Authorization</a></p>
    </div>
</body>
</html>