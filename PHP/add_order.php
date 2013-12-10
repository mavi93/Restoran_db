<!DOCTYPE html>
<html lang="ru-RU">
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
</html>