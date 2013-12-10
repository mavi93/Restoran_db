<?php
	mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
	mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

	$date=$_POST['date'];
	$result = mysql_query("SELECT * FROM report WHERE date='$date'") or die('Query failed: ' . mysql_error());
	
	echo '<table border=1>';
	echo '<tr>';
	echo '<th>Дата</th>';
	echo '<th>Шифр блюда</th>';
	echo '<th>Количество заказов</th>';
	echo '<th>Общая стоимость</th>';
	echo '</tr>';
	while ($data = mysql_fetch_assoc($result)) {

		echo '<tr>';
		echo '<td> '.$data['date'].' </td>';
		echo '<td> '.$data['id_blud']. '</td>';
		echo '<td> '.$data['num_blud']. '</td>';
		echo '<td> '.$data['totalvalue']. '</td>';
		echo '</tr>';
	}
?>