<?php
	mysql_connect("localhost", "mavi", "farcry");
	mysql_select_db("restoran");

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
			echo "Shit!";
		}
	}
?>