<?php
	session_start();
		//als sessie = true en datum is gegeven
	if ($_SESSION['loggedin']!=true && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['maand']) && !isset($_GET['jaar']) && !isset($_GET['selected']) && !isset($_GET['melding'])) {
		header("Location: personeel.php");
	}

	//uit url halen
	$datum = $_GET['datum'];
	$dag = $_GET['dag'];
	$maand = $_GET['maand'];
	$jaar = $_GET['jaar'];
	$selected = $_GET['selected'];
	$melding = $_GET['melding'];

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
					<h3>HIER KOMT DE MEDELING TE STAAN</h3>
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
						<p>U heeft de docent op afwezig gezet.</p>
					<?php } ?>

					<?php if ($selected == 'lokaal') { ?>
						<p>U hebt het lokaal! Verschoven naar <?php echo $melding ?></p>
					<?php } ?>

					<?php if ($selected == 'reden') { ?>
						<p><?php echo $melding ?></p>
					<?php } ?>

					<!-- Vaste datum -->
					<p>Datum die u wilt wijzigen: <?php echo $datum . " " . $dag . " " . $maand . " " . $jaar ?></p>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	<!-- ./JS -->
</body>
</html>