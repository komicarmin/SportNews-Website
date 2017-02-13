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
			
			<div class="banner">
				<ul>
					<?php
						$qNovo = mysql_query("SELECT * FROM novice ORDER BY ogledi DESC LIMIT 3");
						while($novica = mysql_fetch_assoc($qNovo))
						{
							$slika = $novica['slika'];
							echo "<li style='background-image: URL(" . $slika . ")'>";
								echo "<div class='slide'>" . $novica['naslov'] . "</div>";
							echo "</li>";
						}
					?>
				</ul>
				<script src="//code.jquery.com/jquery-latest.min.js"></script>
				<script src="js/unslider.min.js"></script>
				<script>
					$(document).ready(function(){
					$('.banner').unslider({
					speed: 500,               //  The speed to animate each slide (in milliseconds)
					delay: 5000,              //  The delay between slide animations (in milliseconds)
					keys: true,               //  Enable keyboard (left, right) arrow shortcuts
					dots: false,               //  Display dot navigation
					fluid: false              //  Support responsive design. May break non-responsive designs
				});
			});
				</script>
			</div>
			
			<div id="najmeni">
				<a href="index.php?naj=Najnovejse">
					<div class="najgumb" 
					<?php 
					if(!isset($_GET['naj'])) $naj = "Najnovejse"; else $naj = $_GET['naj'];
					if($naj == "Najnovejse") echo "id='izbran'"; ?>>
					Najnovejše novice
					</div>
				<a/>
				<a href="index.php?naj=NajBrane">
					<div class="najgumb" style="margin-left: 15px;" 
					<?php
					if(!isset($_GET['naj'])) $naj = "Najnovejse"; else $naj = $_GET['naj'];
					if($naj == "NajBrane") echo "id='izbran'"; ?>>
					Najbolj brane
					</div>
				</a>
			</div>
			
			<div id="naj">
				<?php 
				if(!isset($_GET['naj'])) $naj = "Najnovejse"; else $naj = $_GET['naj'];
					if($naj == "Najnovejse")
					{
						$qNovo = mysql_query("SELECT * FROM novice ORDER BY datum DESC LIMIT 3");
						while($novica = mysql_fetch_assoc($qNovo))
						{
							echo "<a href='novica.php?id=" . $novica['id_novica'] . "'><div class='najNovica'>" . "<img src='" . $novica['slika'] . "' class='slika'>" . $novica['naslov'] . "</div></a>";
						}
					}
					else if($naj == "NajBrane")
					{
						$qNovo = mysql_query("SELECT * FROM novice ORDER BY ogledi DESC LIMIT 3");
						while($novica = mysql_fetch_assoc($qNovo))
						{
							echo "<a href='novica.php?id=" . $novica['id_novica'] . "'><div class='najNovica'>" . "<img src='" . $novica['slika'] . "' class='slika'>". $novica['naslov'] . "</div></a>";
						}
					}
				?>
			</div>
			
			<div id="vsebina">
				<div class="sport" style="width: 1040px; height: 260px;">
					<a href="kategorija.php?kategorija=Nogomet" style="color: black;"><div class="naslov" style="width: 1030px;">Nogomet</div></a>
				</div>
				<div class="sport">
					<a href="kategorija.php?kategorija=Kosarka" style="color: black;"><div class="naslov">Košarka</div></a>
				</div>
				<div class="sport">
					<a href="kategorija.php?kategorija=Rokomet" style="color: black;"><div class="naslov">Rokomet</div></a>
				</div>
				<div class="sport">
					<a href="kategorija.php?kategorija=Hokej" style="color: black;"><div class="naslov">Hokej</div></a>
				</div>
				<div class="sport">
					<a href="kategorija.php?kategorija=Tenis" style="color: black;"><div class="naslov">Tenis</div></a>
				</div>
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