<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>music</title>
    <link rel=" icon" type="image/x-icon" href="/created/images/favicon.ico">
    <script src="/created/playerjs.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/created/css/mainpage.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <script src="//site.com/playerjs.js" type="text/javascript"></script>
</head>
<div class="header">
    <div class="column-header positioner">
        <div class="logo">
       <a href="/created"><img src="/created/images/logo.png"></a>
       </div>  
       <div class="menu">    
      <?php 
  if($_SESSION['role']==3)
  echo '<p ><a href=/created/upload.php><img src="/created/images/upload.png"><br />upload<p>';
  ?>
  </div>
   </div>
    <div class="link_logout">
        <?php  echo '<p>'.$_SESSION['login'].'</p>';?>
    <a href="/created/logout.php"><img src="/created/images/logout.png"><br />logout<Logout</div></a>
    </div>
</div>