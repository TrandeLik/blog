<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="margin:0; padding:0">
<?php
    session_start();
    if (isset($_SESSION['auth']) and $_SESSION['auth'] == true){
        $connection = mysqli_connect('127.0.0.1', 'root', '');
        mysqli_select_db($connection, 'blog');
        mysqli_set_charset($connection, 'utf8');
        if (isset($_POST['del_id'])){
            mysqli_query($connection,'DELETE FROM `articles` WHERE `id` = '.$_POST["del_id"].';');
            mysqli_query($connection,'DELETE FROM `comments` WHERE `article_id` = '.$_POST["del_id"].';');
        }
        $query_result_articles = mysqli_query($connection, 'SELECT * FROM articles');
        $articles = mysqli_fetch_all($query_result_articles);
        echo "<h1 style='text-align: center;'>Мои статьи</h1>";
        echo "<ul>";
        foreach ($articles as $article){
            echo "<li style='list-style-type: none;'>
                  <div class='row'>
                  <div class='offset-md-2 col-md-8 col-12'>
                  <div class='card'>
                    <div class='card-body'>
                        <h3>$article[1]</h3><br>
                        <p>".substr($article[2], 0, 150)."<p><br>
                        <form action='article.php' method='POST'>
                            <input type='hidden' name='id' value='$article[0]'>
                            <input type='submit' value='Читать продолжение' class='btn btn-primary'>
                        </form>
                        <form action='edit.php' method='POST'>
                            <input type='hidden' name='id' value='$article[0]'>
                            <input type='submit' value='Редактировать' class='btn btn-success'>
                        </form>
                        <form action='admin.php' method='POST'>
                            <input type='hidden' name='del_id' value='$article[0]'>
                            <input type='submit' value='Удалить' class='btn btn-danger'>
                        </form>
                    </div>
                  </div>
                  </div>
                  </div>
                </li><br>";
        }
        echo "</ul>";
        echo "<a class='btn btn-primary' href='login.php?exit=true'>Выход</a>";
    }else{
      echo "<h1 style='text-align: center;'>ТЕБЕ СЮДА НЕЛЬЗЯ</h1>";
    }
 ?>

</body>
</html>
