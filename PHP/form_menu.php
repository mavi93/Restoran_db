<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body>
		<div class="main_block">
		<div class="center_block">
			<form>
				<fieldset>
					<?php
						mysql_connect("localhost", "mavi", "farcry") or die("Не удалось соединиться: " .mysql_error());
						mysql_select_db("restoran") or die("Не удалось выбрать базу данных: " .mysql_error());

						if(isset($_POST['submit']))
						{
							$query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");
							$data = mysql_fetch_assoc($query);

							if($data['user_password'] === $_POST['password'])
							{
								header('location:http://Localhost/bdrest/form_director.html'); 
								exit();;
							}
							else
							{
								echo "Пароль не верный!";
							}
						}
						mysql_close();
					?>
					<p><a href="../form_menu.html">Попробывать ещё раз</a><p>
					<p><input name="exit" type="button" value="Попробывать ещё раз" onclick="location.href='../form_menu.html'"></p>
				</fieldset>
			</form>
		</div>
		</div>
	</body>
</html>