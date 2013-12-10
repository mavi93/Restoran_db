<html>
	<head>
		<title>Список сотрудников</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../style.css">
		<style>
			.form-signin{
				max-width: 60%;
			}
			table{
				cellspacing: 5; 
				cellpadding: 5;
				width: 100%;
				color: white;
			}
			body{
				width: 70%;
			}
			</style>
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
				case 'delete':
					//echo "сделано 1";
				    if ($id) {
				    	//echo "Сделано";
				        $mDel = mysql_query("DELETE FROM worker WHERE id_work = '$id' ");
				        if ($mDel) 
				        {
				            //echo "Сделано ваще всё";
				            header("location: show_workers.php");
				        }
				        else
				        {	
				        	echo "<div class='form-signin'>";
				        	echo "Невозможно удалить данного пользователя!";
				        	echo '<br/><input name="return" type="button" value="Вернуться назад" onclick="location.href=\'../PHP/show_workers.php\'" class="btn">';
				        	echo "</div>";
				        }
				    }
			    break;

				/**
				*  $do == edit
				*  Тут выводим форму для
				*  редактирования данных
				**/
			    case 'edit':
				    if($id) 
				    {
					    $qr_result = mysql_query("SELECT * FROM worker WHERE id_work='$id' ") or die("Запрос не удался" .mysql_error());
						while($data = mysql_fetch_array($qr_result)) 
						{	
							echo '<form action="../PHP/update_worker.php" method="post" class="form-signin2">';
							echo '<table align=center>';
							echo '<tr>';
							echo '<th><p>Фамилия*</p></th>';
							echo '<th><p>Дата рождения*</p></th>';
							echo '<th><p>Адрес*</p></th>';
							echo '<th><p>Дата принятия на работу*</p></th>';
							echo '<th><p>Должность*</p></th>';
							echo '<th><p>Дата увольнения</p></th>';
							echo '<th><p>Оклад*</p></th>';
							echo '<th><p>Дата установки оклада*</p></th>';
							echo '</tr>';
							echo '<tr>';
							echo '<input name="id" type="hidden" value="'.$data['id_work'].'" class="">';
							echo '<td><input name="lastname" type="text" placeholder="Cуппес" value="'.$data['last_name'].'" class="" required></td>';
							echo '<td><input name="birthday" type="date" value="'.$data['birthday'].'" class="" required></td>';
							echo '<td><input name="adress" type="text" value="'.$data['adress'].'" placeholder="ул.Бакунинская 3 кв. 120" class="" required></td>';
							echo '<td><input name="dateadmis" type="date" value="'.$data['date_admis'].'" class="" required></td>';
							echo '<td><input name="post" value="'.$data['post'].'" type="text" placeholder="Официант" class="" required></td>';
							echo '<td><input name="firedate" value="'.$data['fire_data'].'" type="date" class=""></td>';
							echo '<td><input name="pay" type="text" value="'.$data['pay'].'" placeholder="15000" class="" required></td>';
							echo '<td><input name="payinsdate" value="'.$data['date_inst_pay'].'" type="date" class="" required></td>';
							echo '</tr>';
							echo '</table>';
							echo '<br>';
							echo '<input type="submit" name="submit_edit" value="Изменить данные" class="btn">';
							//echo '<p><input type="button" name="return" value="Вернуться назад" class="btn"></p>';
							echo '<input name="return" type="button" value="Вернуться назад" onclick="location.href=\'../PHP/show_workers.php\'" class="btn">';
							echo '</form>';
						}
					}
	   			break;

				/**
				*  $do == null
				*  Выводим страницу
				**/
				default:	
					$qr_result = mysql_query("SELECT * FROM `worker`") or die("Запрос не удался" .mysql_error());

					echo "<div class='form-signin'>";
					echo '<table align=center>';
					echo '<tr>';
					echo '<th>Номер</th>';
					echo '<th>Фамилия</th>';
					echo '<th>Дата рождения</th>';
					echo '<th>Адресс</th>';
					echo '<th>Должность</th>';
					echo '</tr>';
					
					while($data = mysql_fetch_array($qr_result))
					{
						echo '<tr>';
						echo '<td> '.$data['id_work'].' </td>';
						echo '<td> '.$data['last_name']. '</td>';
						echo '<td> '.$data['birthday']. '</td>';
						echo '<td> '.$data['adress']. '</td>';
						echo '<td> '.$data['post'].' </td>';
						echo '<td> <a href="?do=delete&id='.$data['id_work'].'" onclick="return confirm(\'Вы действительно хотите удалить этого пользователя?\') "><input name="del_work" type="button" value="-" class="btn"></a> </td>';
						echo '<td> <a href="?do=edit&id='.$data['id_work'].'"><input name="edit_work" type="button" value="Edit" class="btn"></a> </td>';
						echo '<tr>';
					}
					echo '</table>';
					mysql_free_result($qr_result);
					echo '<br>';
					echo '<div align=center>';
					echo '<input name="add_work" type="button" value="Добавить сотрудника" onclick="location.href=\'../add_workers.html\'" class="btn">';
					echo '<input name="return" type="button" value="Вернуться назад" onclick="location.href=\'../form_director.html\'" class="btn">';
					echo '<input name="exit" type="button" value="Выход" onclick="location.href=\'../form_menu.html\'" class="btn">';
					echo '</div>';
				break;
			}	
			mysql_close();
		?>
		</div>
	</body>
</html>