<?php
	// feedback en session een default waarde geven
	$feedbackEr = "";
	$_SESSION['loggedin'] = false;

	// Zien of post niet leeg is en user uit databank halen
	if(!empty($_POST))
	{
		try
		{
			include_once("classes/Admin.class.php");

			$u = new Admin();
			$u->Email = $_POST['personeelEmail'];
			$u->Password = $_POST['password'];
			$u->Find();

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
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav <?php 	if($_SESSION['loggedin'] == false){
						echo 'class="hidden"';
				  	}
				  	else
				  	{
				  		echo 'class="block"';
				  	}
			  ?>> <!-- nav verschijnt als je inlogt -->
			<a href="logout.php">LOG OUT</a>
		</nav> <!-- End nav -->

		<header>
			<h1>MoreSchedule</h1>
		</header> <!--  End header -->

		<section id="login" <?php if($_SESSION['loggedin'] == true){
										echo 'class="hidden"';
								  }
							?>> <!-- als je inlogt dan moet de loginform verdwijnen -->
			<div class="wrapper">
				<h1>Login</h1>
				<form action="" method="post">
					<p class="cf">
						<label for="name">Persooneelsnummer</label>
						<input type="text" name="personeelEmail" id="personeelEmail" placeholder="u1234878">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="password" id="password" placeholder="paswoord" >
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

		<section id="loggedin" <?php if($_SESSION['loggedin'] == false){
											echo 'class="hidden"';
									 }
									 else{
									 		echo 'class="block"';
									 }
							   ?>>
			<div class="wrapper">
				<!-- php stuff here for personeel -->
				<div class="weekdag">Welkom <?php echo $_POST['email']; ?></div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- ./JS -->
</body>
</html>