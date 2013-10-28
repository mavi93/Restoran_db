<!doctype html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css">
		<title>Удаление рабочего</title>
	</head>
	<body>
		<?php
			mysql_connect("localhost", "mavi", "farcry");
			mysql_select_db("restoran");
			$sql = "SELECT * FROM worker";
			$result_select = mysql_query($sql);

			/*Выпадающий список*/
			echo "<select name = ''>";
			while($object = mysql_fetch_object($result_select))
			{
				echo "<option value = '$object->last_name' > $object->last_name </option>";
			}
			echo "</select>";
		?>
	</body>
</html>