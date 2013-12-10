<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<title></title>
	<meta charset="UTF-8" />
</head>
<body>
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

			echo '<table>
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
						Итог:';
			echo ($totalvalue);

			echo'	</td>
					</tr>
					</table>';
		}
		else
		{
			echo "Ошибка!";
		}
	?>
</body>
</html>