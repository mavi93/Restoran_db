<html lang="ru-RU">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class="main_block">
      <form class="form-signin">
        <?php
          $login = $_POST['login'];
          $password = $_POST['password'];

          if (isset($_POST['submit1'])) 
          {
            mysql_connect('localhost', 'root', '') or die ("Не удалось подключиться к MySQL: ".mysql_error());
            mysql_select_db('restoran') or die ("Не удалось подключиться к базе данных: ".mysql_error());
            $query = "SELECT type FROM worker WHERE last_name='$login' AND pwd='$password' ";
            if($type = mysql_fetch_array(mysql_query($query)))
            {
              if ($type[type] == 1)
              {
              setcookie("login", "director", time()+3600*3);
              setcookie("password", "director", time()+3600*3); 
              header("location:../form_director.html");
              exit();
              }

              if ($type[type] == 2)
              {
              setcookie("login", "waiter", time()+3600*3);
              setcookie("password", "waiter", time()+3600*3);
              header("location:../form_waiter.html");
              exit();
              }

              if ($type[type] == 3)
              {
              setcookie("login", "cook", time()+3600*3);
              setcookie("password", "cook", time()+3600*3);
              header("location:../PHP/forcook.php");
              exit();
              }
            }
            else 
            {
            echo("<h2>Вы ввели не правильный логин или пароль!</h2>");
            }
          }

          if (isset($_POST['submit2'])) 
          {
            if ( mysql_connect('localhost', $login, $password) )
            {
              header("location: ../extratask.html");
              exit();
            }
            //echo "Ку-ку!";
          }
        ?>
        <p><input type="button" value="Ввести ещё раз" onclick="location.href='../form_menu.html'" class="btn"></p>
      </form>
    </div>
  </body>
</html>