<?php
	include ("povezava.php");
	session_start();
	$user = $_SESSION['user'];
		if(empty($user))
		{
			header('Location: prijava.html');
		}
?>

<html>
<head>
	<title>Sport News</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
		<div id="container">
			<div id="glava">
				<div id="iskanje">
				<form action="" method="get"><input type="text" name="search" placeholder="Iskanje"></form>
				</div>
				<div id="odjava">
					<?php echo $user . "   "; ?> <a href="odjava.php" style="text-decoration: underline;">Odjava</a>
				</div>
			</div>
			
			<div class="logo">
				<p class="logo"><b style="color:#57CA1F;">S</b>port<b style="color:#0289A6;">N</b>ews</p>
			</div>
			
			<div id="meni">
				<a href="index.php">Domov</a>
				<a href="kategorija.php?kategorija=Nogomet">Nogomet</a>
				<a href="kategorija.php?kategorija=Kosarka">Košarka</a>
				<a href="kategorija.php?kategorija=Rokomet" >Rokomet</a>
				<a href="kategorija.php?kategorija=Hokej">Hokej</a>
				<a href="kategorija.php?kategorija=Tenis">Tenis</a>
			</div>
			
			<div id="vsebina" style="width: 1040px; height: auto; padding: 5 10 25 10; font-size: 14px;">
				<?php
					$id = $_GET['id'];
					$qNovica = mysql_query("SELECT * FROM novice WHERE id_novica='$id'");
					$novica = mysql_fetch_assoc($qNovica);
					$ogledi = $novica['ogledi'] + 1;
					mysql_query("UPDATE novice SET ogledi='$ogledi' WHERE id_novica='$id'");
					echo "<h2 align='center'>" . $novica['naslov'] . "</h2>";
					echo "<img src='" . $novica['slika'] . "' width='450px' height='300px' style='float: left; padding: 0 10 10 0;'>";
					echo $novica['besedilo'];
					if(!empty($novica['yt']))
					{
						$ex = explode("=",$novica['yt']);
						$link = "https://www.youtube.com/embed/" . $ex[1];
						echo "<center><iframe width='640' height='360' src='" . $link . "' frameborder='0' allowfullscreen></iframe></center>";
					}
				?>
			</div>
		</div>
		<div id="noga">
			<div class="nogaVsebina">
				<div class="logo" style="float: left;">
					<p class="logo"><b style="color:#57CA1F;">S</b>port<b style="color:#0289A6;">N</b>ews</p>
				</div>
				<div id="botmeni">
					<a href="index.php">Domov</a>
					<a href="kategorija.php?kategorija=Nogomet">Nogomet</a>
					<a href="kategorija.php?kategorija=Kosarka">Košarka</a>
					<a href="kategorija.php?kategorija=Rokomet" >Rokomet</a>
					<a href="kategorija.php?kategorija=Hokej">Hokej</a>
					<a href="kategorija.php?kategorija=Tenis">Tenis</a>
				</div>
			</div>
		</div>
</body>
</html>