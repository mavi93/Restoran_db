<?php
	mysql_connect("localhost", "mavi", "farcry");
	mysql_select_db("restoran");

	$query = "SELECT * FROM `worker`";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
		echo "Номер: ".$row['id_work']."<br>\n";
		echo "Фамилия: ".$row['last_name']."<br>\n";
		echo "Дата рождения: ".$row['birthday']."<br>\n";
		echo "Адресс: ".$row['adress']."<br>\n";
		echo "Должность: ".$row['post']."<br><hr>\n";
	}
?>