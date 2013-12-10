<?php
	mysql_connect("localhost", "mavi", "farcry") or die("Íå óäàëîñü ñîåäèíèòüñÿ: " .mysql_error());
	mysql_select_db("restoran") or die("Íå óäàëîñü âûáðàòü áàçó äàííûõ: " .mysql_error());

	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];
	//$birthday = date('Y-m-d', strtotime(str_replace('-', '/', $birthday)));
	//$birthday = mysql_real_escape_string($_POST['birthday']);
	$adress = $_POST['adress'];
	$dateadmis = $_POST['dateadmis'];
	$post = $_POST['post'];
	$firedate = $_POST['firedate'];
	$pay = $_POST['pay'];
	$payinsdate = $_POST['payinsdate'];

	$result = mysql_query("INSERT INTO worker (last_name, birthday, adress, date_admis, post, fire_data, pay, date_inst_pay)
							VALUES ('$lastname', '$birthday', '$adress', '$dateadmis', '$post', '$firedate', '$pay', '$payinsdate')");
	//Åñëè çàïðîñ ïðîéäåò óñïåøíî òî â ïåðåìåííóþ result âåðíåòñÿ true
	if($result == 'true') 
		{header("location: show_workers.php");}
	else
		{echo "Âàøè äàííûå íå äîáàâëåíû";}
?>