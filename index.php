<?php
include "header.php";
include 'bdconnect.php';
if(!isset($_SESSION['role']))
header('Location:/created/auth.php');

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT * FROM `content` GROUP BY release_name";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
?>

<body>
  <div class="content positioner">
    <?php while($res=mysqli_fetch_assoc($result)){
    ?>
    <div class="release">
    <div class="cover"><a href="listen.php?release=<?php  echo  $res['release_name'];?>"><img src="<?php echo $res['cover_path']?>"></a></div>
    <div class="info">
        <div class="artist"><?php echo $res['author']?></div>
        <div class="name"><?php echo $res['release_name']?></div>
        </div>
    </div>
    <?php }?>
    </div>
</body> 
    

