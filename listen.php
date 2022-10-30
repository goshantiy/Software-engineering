<?php
include "header.php";
include 'bdconnect.php';
if (!isset($_SESSION['role']))
{
    header('Location:/auth.php');
    exit();
}
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$NAME = strip_tags(htmlspecialchars(mysqli_escape_string($link,$_GET['release'])));
if (!isset($NAME))
{
    header('Location:/index.php');
    exit();
}
$query = "SELECT * FROM `content` WHERE release_name LIKE '$NAME'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$res = mysqli_fetch_assoc($result);
        if(!isset($res))
        {
            header('Location:/index.php');
            exit();
        }
?>
<body>
    <div class="content positioner center">
        <div class="info-album">
            <div class="cover-album">
                <a href="listen.php?release=<?php echo $res['release_name']; ?>">
                    <img src="<?php echo $res['cover_path'] ?>"></a>
            </div> 
            <div class=info>
                <div class="artist"><?php echo $res['author'] ?></div>
                <div class="name"><?php echo $res['release_name'] ?>
                </div></div></div>
        <div class="info-songs">
            <?php do { ?>
                <div class="songs"> 
                    <div class="name"><?php echo $res['song_name'] ?>  <br/>      <audio
                            controls
                            src="<?php echo $res['audio_path'] ?>"></div>
                </div>
            <?php } while ($res = mysqli_fetch_assoc($result)) ?>
        </div>
</body> 
