<?php 
include "header.php";
include 'bdconnect.php';
if(!isset($_SESSION['role']))
{
header('Location:/created/auth.php');
exit();
}
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 
$NAME = strip_tags(htmlspecialchars(mysqli_escape_string($link, $_GET["search_field"])));
if(isset($NAME))
{   
$query ="SELECT * FROM `content` WHERE LOWER(song_name) LIKE LOWER ('%$NAME%') OR LOWER(release_name) LIKE LOWER ('%$NAME%') OR LOWER(author) LIKE LOWER ('%$NAME%')";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
else
{
$query ="SELECT * FROM `content`";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
?>  

<div class="content positioner center">
    <div class="find">
    <center>Search: </center>
<form action = "find.php" method="get" class="find-form">
<input type = "search" name = "search_field" placeholder = "Введите название">
<input type = "submit" value = "Поиск">
</form>
    </div>
<?php while($res=mysqli_fetch_assoc($result)){
    ?>
    <div class="releases">
        <div class="cover"><a href="listen.php?release=<?php  echo  $res['release_name'];?>"><img src="<?php echo $res['cover_path']?>"></a></div>
    <div class="info">
        <div class="artist"><?php echo $res['author']?></div>
        <div class="name"><?php echo $res['release_name']?>
        <div class="name"><?php echo $res['song_name']?></div></div>
        <audio
        controls
        src="<?php echo $res['audio_path']?>">
    </audio>
        </div>
    </div>
    <?php }?>
</div>