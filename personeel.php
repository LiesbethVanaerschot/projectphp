<?php
	include ('include/Personeel.include.php');
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personeel - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
</head>
<body>
	<div id="container">
		<header>
			<h1>MoreSchedule</h1>
		</header> <!--  End header -->

		<section id="login"> <!-- als je inlogt dan moet de loginform verdwijnen -->
			<div class="wrapper">
				<h1>Login</h1>
				<form action="" method="post" class="personeelLogin">
					<p class="cf">
						<label for="name">Persooneelsnummer</label>
						<input type="text" name="personeelsNummer" id="personeelsNummer" placeholder="u0123456">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="paswoord" id="paswoord" placeholder="wachtwoord" >
					</p>
					<p class="cf">
						<input type="submit" class="btnLogin" name="btnLogin" value="LOG IN">
					</p>
				</form>

			<?php if(isset($feedbackEr)){ ?>
				<div id="feedbackLogin" class="cf">
					<p class="nok"><?php echo $feedbackEr; ?></p>
				</div>
			<?php } ?>
			</div>
		</section><!-- End login -->


	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- ./JS -->
</body>
</html>