<?php
if ( !session_id() )
session_start();
if (!isset($_SESSION['role'])) {
    header('Location:auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>music</title>
        <link rel=" icon" type="image/x-icon" href="/images/favicon.ico">
        <link rel="stylesheet" href="/css/mainpage.css" type="text/css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
        <meta charset="utf-8">
    </head>
    <div class="header">
        <div class="column-header positioner">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png"></a>
            </div>  
            <div class="menu">    
                <?php
                    echo '<a href=/find.php><img src="images/find.png"><br/><center>find</center>';
                if ($_SESSION['role'] == 3)
                    echo '<a href=/upload.php><img src="images/upload.png"><br/><center>upload</center>';
                ?>
            </div>
        </div>
        <div class="link_logout">
            <?php echo '<p>' . $_SESSION['login'] . '</p>'; ?>
            <a href="logout.php"><img src="/images/logout.png"><br/>logout</a>
        </div>
    </div>