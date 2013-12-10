<!DOCTYPE html>
	<head>
		<title>Страница директора</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<?php
			mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
			mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

			
			$id_tab = $_POST['id_tab'];
			$date = $_POST['date'];
			$id_menu_1 = $_POST['id_menu_1'];
			$num_1 = $_POST['num_1'];

			print_r($id_menu_1);
			print_r($num_1);
			

			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_1");
			$data = mysql_fetch_array($qr_result);
			$cost_1=$data['cost']*$num_1;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_2");
			$data = mysql_fetch_array($qr_result);
			$cost_2=$data['cost']*$num_2;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_3");
			$data = mysql_fetch_array($qr_result);
			$cost_3=$data['cost']*$num_3;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_4");
			$data = mysql_fetch_array($qr_result);
			$cost_4=$data['cost']*$num_4;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_5");
			$data = mysql_fetch_array($qr_result);
			$cost_5=$data['cost']*$num_5;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_6");
			$data = mysql_fetch_array($qr_result);
			$cost_6=$data['cost']*$num_6;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_7");
			$data = mysql_fetch_array($qr_result);
			$cost_7=$data['cost']*$num_7;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_8");
			$data = mysql_fetch_array($qr_result);
			$cost_8=$data['cost']*$num_8;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_9");
			$data = mysql_fetch_array($qr_result);
			$cost_9=$data['cost']*$num_9;
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu_10");
			$data = mysql_fetch_array($qr_result);
			$cost_10=$data['cost']*$num_10;

			echo "/n";
			print_r($cost_1);
			echo "/n";
			print_r($cost_2);
			//print_r($id_tab);
			//print_r($date);
			//print_r($num);
			$totalvalue=$cost_1+$cost_2+$cost_3+$cost_4+$cost_5+$cost_6+$cost_7+$cost_8+$cost_9+$cost_10;


			$mm_res=mysql_query("INSERT INTO `order` (totalvalue, timedata, id_work, id_tab)
							VALUES ('$totalvalue', '$date', '3', '$id_tab') ") or die( mysql_error());

			$qt_result=mysql_query("SELECT id_or FROM `order` ORDER BY id_or DESC LIMIT 1") or die (mysql_error());
			$data = mysql_fetch_array($qt_result);
			$id_order=$data['id_or'];
			//print_r($data);
			$i=9;
			$result = mysql_query("INSERT INTO orderline (weight, cost, id_or, id_m)
									VALUES ('$num_1', '$cost_1', '$id_order', '$id_menu_1'), 
											($cost_$i, '$cost_2', '$id_order', '$id_menu_2'),	
											('$num_3', '$cost_3', '$id_order', '$id_menu_3'),
											('$num_4', '$cost_4', '$id_order', '$id_menu_4'),
											('$num_5', '$cost_5', '$id_order', '$id_menu_5'),
											('$num_6', '$cost_6', '$id_order', '$id_menu_6'),
											('$num_7', '$cost_7', '$id_order', '$id_menu_7'),
											('$num_8', '$cost_8', '$id_order', '$id_menu_8'),
											('$num_9', '$cost_9', '$id_order', '$id_menu_9'),
											('$num_10', '$cost_10', '$id_order', '$id_menu_10') ") or die(mysql_error());
			//Если запрос пройдет успешно то в переменную result вернется true
			if($result == 'true') 
				{
					echo '
					<div align="center">
					<form class="form-signin">
							<b>Данные добавлены</b>
							<p><input name="check" type="button" value="Сформировать чек" onclick="location.href="check.php"" class="btn btn-primary"></p>
							<p><input name="exit" type="button" value="Выход" onclick="location.href="form_menu.html"" class="btn btn-primary"></p>
					</form>
				</div> ';
				}
			else
				{echo "Ваши данные не добавлены";}
		?>
	</body>
</html>