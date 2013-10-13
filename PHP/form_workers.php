<html>
<head>
	<title>Список сотрудников</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<?php
		mysql_connect("localhost", "mavi", "farcry") or die("Невозможно подключиться: " .mysql_error());
		mysql_select_db("restoran") or die("Не возможно выбрать базу данных: " .mysql_error());

		$qr_result = mysql_query("SELECT * FROM `worker`") or die(mysql_error());

		echo '<table border="1">';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Номер</th>';
		echo '<th>Фамилия</th>';
		echo '<th>Дата рождения</th>';
		echo '<th>Адресс</th>';
		echo '<th>Должность</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		
		while($data = mysql_fetch_array($qr_result))
		{
			echo '<tr>';
			echo '<td>' .$data['id_work'].'</td>';
			echo '<td>' .$data['last_name'].'</td>';
			echo '<td>' .$data['birthday'].'</td>';
			echo '<td>' .$data['adress'].'</td>';
			echo '<td>' .$data['post'].'</td>';
			echo '<tr>';
		}
		echo '</tbody>';
		echo '</table>';

		mysql_close();
	?>
</body>
</html>