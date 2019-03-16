<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
  if (isset($_POST["id"])){
      $connection = mysqli_connect('127.0.0.1', 'root', '');
      mysqli_select_db($connection, 'blog');
      mysqli_set_charset($connection, 'utf8');
      $query_result_articles = mysqli_query($connection, 'SELECT * FROM `articles` WHERE `id` ='.$_POST["id"].';');
      $article = mysqli_fetch_all($query_result_articles)[0];
      echo "
        <div class='jumbotron'>
          <h3 class='display-4'>$article[1]</h3>
          <p class='lead' style='width: 100%'>$article[2]<p>
        </div>
        ";
      echo "
      <form action = 'article.php' method = 'POST'>
          <div class='form-group' style='margin-left: 2%'>
              <input type='hidden' name='id' value='$article[0]'>
              <input type='text' class='form-control' name='name' placeholder='Введите ваш email' style='width: 20%;'><br>
              <textarea name='comment' placeholder='Введите текст комментария' class='form-control' style='width: 20%;'></textarea><br>
              <input type='submit' value='Оставить комментарий' class='btn btn-primary'>
          </div>
      <form>
      ";

      if ((isset($_POST["name"])) and (isset($_POST["comment"]))){
          if (($_POST["name"] != '') and ($_POST["comment"] != '')){
            $name = $_POST["name"];
            $textComment = $_POST["comment"];
            mysqli_query($connection, "INSERT INTO `comments` (`article_id`,`email`, `text`) VALUES('{$_POST["id"]}','{$name}','{$textComment}')");
          } else {
              echo "<br>
              <p>Для того, чтобы оставить комментарий нужно ввести имя пользователя и сам комментарий<p>";
          }
        }
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
            </div>
          </li><br>";
      }
      echo '</ul>
      <a href="/blog/index.php" class="btn btn-primary">На главную</a>';
    } else{
      echo "Такой статьи не существует :(";
    }
?>
</body>
</html>
