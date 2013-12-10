<!DOCTYPE html>
<html lang="ru-RU">
<<<<<<< HEAD
<head>
	<title></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../style.css">
	<style>
		.form-signin{
			max-width: 500px;
		}
	</style>
</head>
<body>
	<div class="form-signin">
	<?php
		mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
		mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

		$id_menu=$_POST['id_menu'];
		$num=$_POST['num'];
		$table=$_POST['id_tab'];
		$date=$_POST['date'];

	
		$i = 0;
		$len_menu=count($id_menu);
		while ($i<$len_menu):
			
			$qr_result =mysql_query("SELECT cost FROM menu WHERE id_m=$id_menu[$i]");
			$i++;
			while ($data = mysql_fetch_assoc($qr_result))
			{
		    	$cost_one[]=$data['cost'];

			}
		endwhile;

		function multi($el1, $el2) 
		{
    		return $el1 * $el2;
		}

		$cost = array_map("multi", $cost_one, $num);

		$totalvalue=array_sum($cost);


		mysql_query("INSERT INTO `order` (totalvalue, timedata, id_work, id_tab)
					VALUES ('$totalvalue', '$date', '1', '$table') ") or die( mysql_error());

		//mysql_query("SELECT id_or FROM `order` ORDER BY id_or DESC LIMIT 1") or die (mysql_error());
		$data = mysql_fetch_array(mysql_query("SELECT id_or FROM `order` ORDER BY id_or DESC LIMIT 1"));
		$id_order=$data['id_or'];

		$j=0;
		while ($j<$len_menu):
			
			$result[]= mysql_query("INSERT INTO orderline (weight, cost, id_or, id_m)
									VALUES ('$num[$j]', '$cost[$j]', '$id_order', '$id_menu[$j]')");
			$j++;
		endwhile;

		if($result)
		{

			echo '<table cellspacing="5" cellpadding="5" width="100%">
						<tr>
							<th>№</th>
							<th>Блюдо</th>
							<th>Стомость</th>
							<th>Количество</th>
							<th>Общая стоимость</th>
						</tr>';
			$h=0;
			$g=1;
			while ($h<$len_menu):
				$bludo[] = mysql_fetch_row(mysql_query("SELECT name_blud FROM menu WHERE id_m='$id_menu[$h]'"));
				
				echo '<tr>';
				echo '<td align="center">';
				echo ($g);
				echo '</td>';
				echo '<td align="center">';
				print_r ($bludo[$h][0]);
				echo '</td>';
				echo '<td align="center">';
				print_r ($cost_one[$h]); 
				echo '</td>';
				echo '<td align="center">';
				print_r ($num[$h]);
				echo '</td>';
				echo '<td align="center">';
				print_r ($cost[$h]);
				echo '</td>';
				echo '</tr>';
			$h++;
			$g++;
			endwhile;
			echo '<tr>
					<td colspan="5" align="right">
						Итог: '.$totalvalue.' руб.';
			//echo ($totalvalue);

			echo'	</td>
					</tr>
					</table>';
		}
		else
		{
			echo "Ошибка!";
		}
	?>
	</div>
	<input name="return" type="button" value="Вернуться к выбору действий" onclick="location.href='../form_waiter.html'" class="btn">
	<input name="exit" type="button" value="Выход" onclick="location.href='../index.html'" class="btn">
</body>
=======
	<head>
		<title>Заказ</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<form action="add_order_mysql.php" method="post" class="">


		№ столика
		<!--<input name="id_tab" type="text" class="form-control input-sm" size="1">-->
		<?php
			mysql_connect("localhost", "cook", "farcry") or die("Не удалось соединиться: " .mysql_error());
			mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

			$qresult = mysql_query("SELECT * FROM `table` ") or die('Query failed: ' . mysql_error());
			echo "<td><select name='id_tab'>";
			while ($data = mysql_fetch_assoc($qresult))
			{
		    	echo '<option value="'.$data['id_tab'].'">'.$data['id_tab'];
			}
			echo "</select>\n</td>";
		?>

		Дата
		<input name="date" type="date" class="form-control input-sm">
		Время
		<input name="time" type="time" class="form-control input-sm">
		<table class="table">
			<tr>
				<th>№</th>
				<th>Блюдо</th>
				<th>Количество</th>
			</tr>
			<?php
				//mysql_connect("localhost", "cook", "farcry") or die("Не удалось соединиться: " .mysql_error());
				//mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());
				$i = 0;
				while ($i++<10):
					echo "<tr>";
					echo "<td>$i</td>";
					$result = mysql_query("SELECT * FROM menu") or die('Query failed: ' . mysql_error());
					?>
					<td><select name='id_menu[]'>
					<option disabled selected>Блюдо</option>
					<?php
					//echo "<td><select name='id_menu[]'>";
					while ($data = mysql_fetch_assoc($result))
					{
				    	echo '<option value="'.$data['id_m'].'">'.$data['name_blud'];
					}
					echo "</select>\n</td>";
					echo "<td><input name='num_$i' type='number' min='0' max='20' class='form-control input-sm'></td>";
					echo '</tr>';
				endwhile;
			?>
		</table>
		
		<input type="submit" name="add_ord" value="Расчитать" class="btn btn-primary">
		<input name="return" type="button" value="Вернуться назад" onclick="location.href='../form_cook.html'" class="btn">
		</form>
	</body>
>>>>>>> 8a08c0a9d793f5cad282f66b8e23cde7a29af633
</html>