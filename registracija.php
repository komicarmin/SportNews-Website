<?php
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$email = $_POST['email'];
	
	include ("povezava.php");
	
	if(!empty($ime) && !empty($priimek) && !empty($user) && !empty($pass) && !empty($pass2) && !empty($email) && $pass==$pass2)
	{
		$q = mysql_query("SELECT * FROM uporabniki WHERE uporabnisko='$user' OR email='$email'");
		$count = mysql_num_rows($q);
		if($count==0)
		{
			$insert = mysql_query("INSERT INTO uporabniki VALUES(NULL, '$ime', '$priimek', '$user', '$pass', '$email', '2')");
			session_start();
			$_SESSION['user'] = $user;
			header('Location: index.php');
		}
		else
		{
			header('Location: registracija.html');
		}
	}
	else
	{
		header('Location: registracija.html');
	}
?>