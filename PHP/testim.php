
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8" />
    <title></title>
    <link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<form action="add_order_mysql_testim.php" method="post" class="">
№ столика
        <!--<input name="id_tab" type="text" class="form-control input-sm" size="1">-->
        <?php
            mysql_connect("localhost", "cook", "farcry") or die("Не удалось соединиться: " .mysql_error());
            mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

            $qresult = mysql_query("SELECT * FROM `table` ") or die('Query failed: ' . mysql_error());
            echo "<td><select name='id_tab'>";
            while ($data = mysql_fetch_assoc($qresult))
            {
                echo '<option value="'.$data['id_tab'].'">'.$data['id_tab'];
            }
            echo "</select>\n</td>";
        ?>

        Дата
        <input name="date" type="date" class="form-control input-sm">
        Время
        <input name="time" type="time" class="form-control input-sm">

          <table class="table">
            <tr>
                <th>Блюдо</th>
                <th>Количество</th>
            </tr>
            </table>
            <div id="block">
            <div class="bar">
                <?php
                echo "<td><select name='id_menu[]'>";
                echo "<option disabled selected>Блюдо</option>";
                $result = mysql_query("SELECT * FROM menu") or die('Query failed: ' . mysql_error());
                //echo "<td><select name='id_menu[]'>";
                while ($data = mysql_fetch_assoc($result))
                {
                    echo '<option value="'.$data['id_m'].'">'.$data['name_blud'];
                }
                echo "</select>\n</td>";
            ?>    
 
            <input name='num[]' type='number' min='0' class='form-control input-sm'>
            <script type="text/javascript">
 
                function add_el()
                {
                    $('#block .bar').eq(0).clone().appendTo($('#block'));
                }

            </script>
        </div>
        </div>
        <input TYPE="button" VALUE="Добавить блюдо" onclick="add_el()" class="btn"><br>        
        <!--<a href="javascript:void(0)" onclick="add_el()">Добавить блюдо</a><br>-->
        <input type="submit" name="add_ord" value="Расчитать" class="btn btn-primary">
        <input name="return" type="button" value="Вернуться назад" onclick="location.href='../form_cook.html'" class="btn">
        </form>
</body>
</html>
