<!doctype html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Редактирование информации о сотруднике</title>
	</head>
	<body>
		<?php
		mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
		mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());


		$qr_result = mysql_query("SELECT * FROM `worker` WHERE id_work=$_GET[id]") or die("Запрос не удался" .mysql_error());
		while($data = mysql_fetch_array($qr_result)) 
		{
			echo '<form action="PHP/add_workers.php" method="post" class="">';
			echo '<table border="1" align=center>';
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
			echo '<td><input name="lastname" type="text" placeholder="Cуппес" value=""  value="'.$row['name'].'" class="" required></td>';
			echo '<td><input name="birthday" type="date" class="" required></td>';
			echo '<td><input name="adress" type="text" placeholder="ул.Бакунинская 3 кв. 120" class="" required></td>';
			echo '<td><input name="dateadmis" type="date" class="" required></td>';
			echo '<td><input name="post" type="text" placeholder="Официант" class="" required></td>';
			echo '<td><input name="firedate" type="date" class=""></td>';
			echo '<td><input name="pay" type="text" placeholder="15000" class="" required></td>';
			echo '<td><input name="payinsdate" type="date" class="" required></td>';
			echo '</tr>';
			echo '</table>';
			echo '<p><input type="submit" name="submit" value="Добавить" class="btn"></p>';
		}

		mysql_close();
		?>
	</body>
</html>