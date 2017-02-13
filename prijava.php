<?php
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	include ("povezava.php");
	session_start();
	
	if(!empty($user) && !empty($pass))
	{
		$q = mysql_query("SELECT * FROM uporabniki WHERE uporabnisko='$user' AND geslo='$pass'");
		$count = mysql_num_rows($q);
		if($count>0)
		{
			header('Location: index.php');
			$_SESSION['user'] = $user;
		}
		else
		{
			header('Location: prijava.html');
		}
	}
	else
	{
		header('Location: prijava.html');
	}
?>