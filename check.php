<?php
	include ('classes/Check.include.php')
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personeel - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav <?php if(isset($_SESSION['loggedin'])){
						echo 'class="block"';
				  	}
				  	else
				  	{
				  		echo 'class="hidden"';
				  	}
			  ?>> <!-- nav verschijnt als je inlogt -->
			<div class="wrapper cf">
				<ul>
					<li class="welkom">Welkom Admin</li>
					<li class="logout"><a href="logout.php">LOG OUT</a></li>
				</ul>
			</div>
		</nav> <!-- End nav -->

		<header>
			<h1>MoreSchedule</h1>
		</header> <!--  End header -->
		<section id="check" <?php if(isset($_SESSION['loggedin'])){
											echo 'class="block"';
									 }
									 else{
									 		echo 'class="hidden"';
									 }
							   ?>>
			<div class="wrapper">
				<!-- php stuff here for meldingen -->
				<h2>Mededeling</h2>
				<div class="check">
					<h3>U gaat de volgende melding doorgeven:</h3>
					<!-- [Docent x[] [vak y] is afwezig op [datum z] -->
					<!--OF-->
					<!-- Afwezig: [Docent x] [vak y] op [datum z] -->

					<!-- Op [datum x] gaat [vak y] door in [lokaal z] -->
					<!--OF-->
					<!-- Lokaalwijziging: [Lokaal x] op [datum y] voor [vak z] -->

					<!-- Door[MELDING x] zal [vak y] op [datum z] niet doorgaan -->
					<!--OF-->
					<!-- Melding: Op [datum x] zal [vak y] niet doorgaan door [MELDING z] -->

					<?php if ($selected == 'afwezig') { ?>
						<p><?php echo "$docent"; ?> zal afwezig zijn op <?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?></p>
					<?php } ?>

					<!-- EIGENLIJK MOETEN WE DAN GEWOON DEZE MELDING IN DE DB ZETTEN (ALS 1 GEHEEL) ZONDER DIE DAAR NOG EENS OP TE SPLITSEN NIET?-->



					<?php if ($selected == 'lokaal') { ?>
						<p>Op <?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?> zal <?php echo "$vak"; ?> uitzonderlijk doorgaan in <?php echo $melding; ?></p>
					<?php } ?>

					<?php if ($selected == 'reden') { ?>
						<p><?php echo $melding ?></p>
					<?php } ?>
				</div>

				<div class="redirectCheck">
						<a href="melding.php" class="links">Pas aan</a>
						<a href="personeel.php" class="rechts">Verzend + maak nieuwe melding</a>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	<!-- ./JS -->
</body>
</html>