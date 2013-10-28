<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            error_reporting(0);
            if ( mysql_connect('localhost', $login, $password) )
            {
              mysql_select_db('restoran') or die("Невозможно подключиться к базе данных: " .mysql_error());
              if ($login=='director')
              {
                header("location:http://Localhost/bdrest/form_director.html");
                exit();
              }
              if ($login=='waiter')
              {
                header("location:http://Localhost/bdrest/form_waiter.html");
                exit();
              }
              if ($login=='cook')
              {
                header("location:http://Localhost/bdrest/form_cook.html");
                exit();
              }
              mysql_close();
            }
            else
            {
                echo "Пароль не верный!";
            }
          }

          if (isset($_POST['submit2'])) 
          {
            echo "Ку-ку!";
          }
        ?>
        <p><input type="button" value="Ввести ещё раз" onclick="location.href='../form_menu.html'" class="btn"></p>
      </form>
    </div>
  </body>
</html>