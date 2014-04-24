<?php
	// feedback en session een default waarde geven
	$feedbackEr = "";
	$crumbs[0] = "";

	// Zien of post niet leeg is en user uit databank halen
	if(!empty($_POST['btnLogin']))
	{
		try
		{
			include_once("classes/Admin.class.php");

			$a = new Admin();
			$a->ANummer = $_POST['personeelsNummer'];
			$a->APaswoord = $_POST['paswoord'];
			$a->Find();

		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}

	if(!empty($_POST['volgende']))
	{
		try {
			$datum = $_POST['datum'];
			$crumbs = explode(" ", $datum);
			if ($crumbs != ""){
				// session_start();
				// $_SESSION['loggedin'] = true;
				header("location: melding.php?datum=" . $crumbs[0] . "&dag=" . $crumbs[1] . "&maand=" . $crumbs[2] . "&jaar=" . $crumbs[3]);
			}
		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personeel - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href="css/classic.css" rel="stylesheet" />
	<link href="css/classic.date.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav <?php 	if(isset($_SESSION['loggedin'])){
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

		<section id="login" <?php if(isset($_SESSION['loggedin'])){
										echo 'class="hidden"';
								  }
							?>> <!-- als je inlogt dan moet de loginform verdwijnen -->
			<div class="wrapper">
				<h1>Login</h1>
				<form action="" method="post">
					<p class="cf">
						<label for="name">Persooneelsnummer</label>
						<input type="text" name="personeelsNummer" id="personeelsNummer" placeholder="u0123456">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="paswoord" id="paswoord" placeholder="wachtwoord" >
					</p>
					<p class="cf">
						<input type="submit" name="btnLogin" value="LOG IN">
					</p>
				</form>

				<?php if ($feedbackEr != ""){ ?>
					<div id="feedback">
						<p class="nok"><?php echo $feedbackEr; ?></p>
					</div>
				<?php } ?>
			</div>
		</section><!-- End login -->

		<section id="loggedin" <?php if(isset($_SESSION['loggedin'])){
											echo 'class="block"';
									 }
									 else{
									 		echo 'class="hidden"';
									 }
							   ?>>
			<div class="wrapper">
				<!-- php stuff here for personeel -->
				<div class="datum">
					<h2>Selecteer een datum:</h2>
					<form action="" method="post">
						<input type="text" class="datepicker" placeholder="Selecteer een datum..." name="datum">
						<input type="submit" class="redirectAdmin" value="Volgende" name="volgende">
					</form>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<script src ="js/script.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script>
		$('.datepicker').pickadate();
	</script>

	<!-- ./JS -->
</body>
</html>