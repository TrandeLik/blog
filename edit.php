<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<?php
  session_start();
  if (isset($_SESSION['auth']) and $_SESSION['auth'] == true){
    $connection = mysqli_connect('127.0.0.1', 'root', '');
    mysqli_select_db($connection, 'blog');
    mysqli_set_charset($connection, 'utf8');
    if (isset($_POST["id"]) and isset($_POST["title"]) and isset($_POST["articleText"])){
      mysqli_query($connection, 'UPDATE `articles` SET `header`= "'.$_POST["title"].'" , `article_text` = "'.$_POST["articleText"].'" WHERE `id` ='.$_POST["id"].';');
    }
    if (isset($_POST["id"]) and isset($_POST["comment_id"])){
      mysqli_query($connection,'DELETE FROM `comments` WHERE `id` = '.$_POST["comment_id"].';');
    }
    if (isset($_POST["id"])){
        $query_result_articles = mysqli_query($connection, 'SELECT * FROM `articles` WHERE `id` ='.$_POST["id"].';');
        $article = mysqli_fetch_all($query_result_articles)[0];
        echo "<h1 style='text-align: center;'>Изменить статью</h1>";
        echo "
          <form action = 'edit.php' method = 'POST'>
              <div class='form-group' style='margin-left: 2%'>
                  <input type='hidden' name='id' value='$article[0]'>
                  <input type='text' name='title' value='$article[1]' class='form-control'><br>
                  <textarea name='articleText' class='form-control' style='height: 70vh;'>$article[2]</textarea><br>
                  <input type='submit' value='Сохранить изменения' class='btn btn-success'>
              </div>
          </form>
          ";
        $query_result_comments = mysqli_query($connection, 'SELECT * FROM `comments` WHERE `article_id` ='.$_POST["id"].';');
        $comments = mysqli_fetch_all($query_result_comments);
        echo '<ul>';
        foreach ($comments as $comment) {
          echo "<li style='list-style-type: none;'>
                  <div class='card-header' style='width: 70%;'>
                    <p>$comment[2], $comment[4]:</p>
                  </div>
                  <div class='card' style='width: 70%; padding-left: 2%;'>
                    <p>$comment[3]</p>
                  </div><br>
                  <form action='edit.php' method='POST'>
                      <input type='hidden' name='id' value='$article[0]'>
                      <input type='hidden' name='comment_id' value='$comment[0]'>
                      <input type='submit' value='Удалить' class='btn btn-danger'>
                  </form>
                </li><br>
          ";
        }
        echo '</ul>';
    }else{
      echo "<h1>С таким уровнем IQ тебя не стоило брать в админы... Не хочешь сказать, какую статью ты собрался редактировать?!</h1>";
    }
  }
?>

</body>
</html>
