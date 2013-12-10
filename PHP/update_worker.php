<?php
	
	mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
	mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

	$id = $_POST['id'];
	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];
	$adress = $_POST['adress'];
	$dateadmis = $_POST['dateadmis'];
	$post = $_POST['post'];
	$firedate = $_POST['firedate'];
	$pay = $_POST['pay'];
	$payinsdate = $_POST['payinsdate'];

	if($_POST['submit_edit']) 
	{
		$query = "UPDATE worker SET last_name='$lastname', birthday='$birthday', adress='$adress', date_admis='$dateadmis', post='$post', fire_data='$firedate', pay='$pay', date_inst_pay='$payinsdate' WHERE id_work='$id'";
		if(mysql_query($query)) 
		{
			//echo 'Data edited successfully';
			header("location: show_workers.php");
		} 
		//or die (mysql_error());
	}
 
?>