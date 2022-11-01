<?php
  include 'bdconnect.php';
  include 'header.php';
  if($_SESSION['role']!=3){
  header('Location:/created/index.php');
  exit();
  }
  if(isset($_POST['btn_submit_song']))
  {
    if(trim($_POST['form-author']) == '') {  
      $errors[] = "Введите автора!";
    }
    if (trim($_POST['form-release-name']) == '') {
        $errors[] = "Введите название песни!";
    }
    if (!file_exists($_FILES['form-song']['tmp_name'][0]) || !is_uploaded_file($_FILES['form-song']['tmp_name'][0])) {
        $errors[] = "Выберите песню!";
    }
    $allowedTypes = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg');
    if (is_uploaded_file($_FILES['form-cover']['tmp_name'][0]) && !in_array($_FILES['form-cover']['type'], $allowedTypes)) {
        $errors[] = "Неверный тип!";
    }
    if (empty($errors))
    {
      $uploaddir = 'music/author/'.$_POST['form-author'].'/';
      if (!file_exists("C:/xampp/htdocs/created/" . $uploaddir)) {
      mkdir("C:/xampp/htdocs/created/".$uploaddir,0777,true);
      }
      $coverName=$_FILES['form-cover']['name'];
      if (is_uploaded_file($_FILES['form-cover']['tmp_name'][0])) {
            if (empty($errors) && !move_uploaded_file($_FILES['form-cover']['tmp_name'], "C:/xampp/htdocs" . $uploaddir . $coverName)) {
                $errors[] = "Ошибка: проблема с обложкой";
            }
        }

        foreach ((array)$_FILES['form-song']["name"] as $key => $value)
      {
      $allowedTypes = array('audio/mpeg3','audio/x-mpeg-3','audio/mpeg');
      if (!in_array($_FILES['form-song']['type'][$key], $allowedTypes))
      {
        echo $_FILES['form-song']['type'][$key];
        $errors[]="Ошибка неверный тип";
      }
      $songName=$_FILES['form-song']['name'][$key];    
      if(empty($errors)&&!move_uploaded_file($_FILES['form-song']['tmp_name'][$key],"C:/xampp/htdocs".$uploaddir.$songName))
      {
      print_r($_FILES['form-song']['name']);
        $errors[]= "Ошибка загрузки";
      }


    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 
    $author = htmlspecialchars(mysqli_real_escape_string($link, $_POST['form-author']));
    $release_name = htmlspecialchars(mysqli_real_escape_string($link,$_POST['form-release-name']));
    $song_name = htmlspecialchars(mysqli_real_escape_string($link,$songName));
      
      if(empty($errors))
      {
        $song_path=$uploaddir.$songName;
        if(!is_uploaded_file($_FILES['form-cover']['tmp_name'][0]))
        {       $cover_path="default/default_cover.png";}
        else
        {
          $cover_path=$uploaddir.$coverName;
        }
        $id=$_SESSION['user_id'];
        $query ="INSERT INTO content VALUES('$id', NULL ,'$author','$release_name','$song_name', '$cover_path', '$song_path')";
          $result = mysqli_query($link, $query) or die("Ошибка sql" . mysqli_error($link)); 
          if($result)
          {
            echo "<span style='color:green; display:flex; justify-content: center;'>Песня загружена</span>";
          }        
          mysqli_close($link);
      }
    else {echo '<div style="color: red; display:flex; justify-content: center; ">' . array_shift($errors). '</div><hr>';}
      }
    }
    else echo '<div style="color: red; display:flex; justify-content: center; ">' . array_shift($errors). '</div><hr>';
  }

  ?>
<body>
    <div class="content positioner center">
        <div class="center info-album left">
            <form enctype="multipart/form-data" action="upload.php" method="post">
                <div class="col-6 form-group">
                    <p>Author:</p>
                    <input type="text" id="form-author" name="form-author" value=""  placeholder="Author"/>
                </div>
                <div class="col-6 form-group">
                    <p>Release Name:</p>
                    <input type="text" id="form-release-name" name="form-release-name" value=""  placeholder="Release name"/>
                </div>
                <div class="col-6 form-group">
                    <p>Songs:</p><input type="file" name="form-song[]" accept=".mp3" multiple="multiple">
                </div>
                <div class="col-6 form-group">
                    <p>Cover:<p/><input type="file" id ="form-cover" accept="image/jpeg,image/png" name="form-cover">
                </div>
                <div class="col-12 left">
                    <button class="btn" id="btn_submit_song" name="btn_submit_song" value="Submit">Submit</button>
                </div>
            </form> 
        </div>
    </div>
</body>
</html>