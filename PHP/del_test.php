<?PHP
 
if (!mysql_connect("localhost", "mavi", "farcry")) die ('<h2>MySQL Error!</h2>');
mysql_select_db("restoran") or die('Could not select database');
 
/**
*  Обрабатываем необходимые переменные
**/
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
$do = isset($_GET['do']) ? $_GET['do']      : false;
 
 
switch ($do) {
 
 
/**
*  $do == edit
*  Тут выводим форму для
*  редактирования данных
*  P.s я бы написал, да лень
**/
case 'edit':
   
    break;
 
 
/**
*  $do == delete
*  Удаляем запись по id
**/    
case 'delete':
    if ($id) {
        $mDel = mysql_query("DELETE FROM `clients` WHERE `id` = '".$id."'");
        if ($mDel) {
            header('Location: http://site.ru/?mess=yesdel');
        }
    }
    break;
 
 
/**
*  $do == null
*  Выводим страницу
**/  
default:
    /* Выполняем SQL-запрос */
    $query = "SELECT * FROM `clients`";
    $result = mysql_query($query) or die('Query failed : '.mysql_error());
     
    $sOut = "
   <table class=sortable border=2>\n
    <thead>
     <tr>
      <th class=unselect>
       №
      </th>
      <th class=unselect>
       Ф.И.О.
      </th>
      <th class=unselect>
       Адрес
      </th>
      <th class=unselect>
       Район
      </th>
      <th class=unselect>
       Телефон
      </th>
     </tr>
    </thead>\n
    <tbody>";
 
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $sOut .= "\t<tr>\n";
       
        foreach ($line as $col_value) {
            $sOut .= "\t\t<td>".$col_value."</td>\n";
        }
        /// тут х.з что у тебя...
        $sOut .= "
       <a href=\"?do=edit&id=".$line['id']."\"> Правка </a> /
       <a href=\"?do=delete&id=".$line['id']."\"> удалить </a>
       \t</tr>\n
       ";
    }
 
    $sOut .= "
   </tbody>
   \n</table>\n
   ";
 
    echo $sOut;
     
    /* Освобождаем память от результата */
    mysql_free_result($result);
    break;
}
 
 
/* Закрываем соединение */
mysql_close();
 
?>