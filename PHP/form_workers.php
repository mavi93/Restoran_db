<?php
	mysql_connect("localhost", "mavi", "farcry");
	mysql_select_db("restoran");

	$query = "SELECT * FROM `worker`";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
		echo "�����: ".$row['id_work']."<br>\n";
		echo "�������: ".$row['last_name']."<br>\n";
		echo "���� ��������: ".$row['birthday']."<br>\n";
		echo "������: ".$row['adress']."<br>\n";
		echo "���������: ".$row['post']."<br><hr>\n";
	}
?>