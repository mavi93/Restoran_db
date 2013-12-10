					<!DOCTYPE html>
					<html lang="ru-RU">
					<head>
						<title></title>
						<meta charset="UTF-8" />
					</head>
					<body>

					<?php
					mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
					mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

					$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
					$do = isset($_GET['do']) ? $_GET['do']      : false;

					switch ($do) {

						/**
						*  $do == delete
						*  Удаляем запись по id
						**/ 
						case 'made':
							//echo "сделано 1";
						    if ($id) 
						    	{
						    	//echo "Сделано";
							        $mDel = mysql_query("UPDATE orderline SET made='1' WHERE id_ordline = '$id' ");
							        if ($mDel) 
							        {
							            //echo "Сделано ваще всё";
							            header("location: forcook.php");
							        }
						    	}
					    break;

					default:
					$qr_result = mysql_query("select wor.last_name, ordl.id_ordline, m.name_blud, ordl.weight, ord.id_tab, ord.id_work from menu m join orderline ordl join `order` ord join worker  wor where m.id_m=ordl.id_m and ordl.id_ordline=ord.id_or and wor.id_work=ord.id_work and ordl.made='0'") or die("Запрос не удался" .mysql_error());

					echo '<table border="1" align=center class="table">';
					echo '<tr>';
					echo '<th>Блюдо</th>';
					echo '<th>Количество</th>';
					echo '<th>Столик</th>';
					echo '<th>Официант</th>';
					echo '</tr>';
					
					while($data = mysql_fetch_array($qr_result))
					{
						echo '<tr>';
						echo '<td> '.$data['name_blud'].' </td>';
						echo '<td> '.$data['weight']. '</td>';
						echo '<td> '.$data['id_tab']. '</td>';
						echo '<td> '.$data['last_name']. '</td>';
						echo '<td> <a href="?do=made&id='.$data['id_ordline'].'"><input name="made" type="button" value="Приготовлен" class="btn"></a> </td>';	
						echo '<tr>';
					}
					echo '</table>';
					mysql_free_result($qr_result);
					echo '<br>';
					echo '<div align=center>';
					echo '<input name="return" type="button" value="Вернуться назад" onclick="location.href=\'../form_director.html\'" class="btn">';
					echo '<input name="exit" type="button" value="Выход" onclick="location.href=\'../form_menu.html\'" class="btn">';
					echo '</div>';
					break;
				}
					?>
	</body>
</html>