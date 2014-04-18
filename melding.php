<?php
	//als sessie = true en dag is gegeven
	/*if (isset($_GET['dag'])){*/
		// session een default waarde geven
		$_SESSION['loggedin'] = true;

		// Zien of post niet leeg is en user uit databank halen
		if(!empty($_POST))
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
	/*} else {
		header('Location: personeel.php');
	}*/
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personeel - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href="css/classic.css" rel="stylesheet" />
	<link href="css/classic.date.css" rel="stylesheet"/>

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
		<section id="loggedin" <?php if(isset($_SESSION['loggedin'])){
											echo 'class="block"';
									 }
									 else{
									 		echo 'class="hidden"';
									 }
							   ?>>
			<div class="wrapper">
				<!-- php stuff here for personeel -->

			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<script src="js/legacy.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script>
		$(".datepicker").pickadate({
		    formatSubmit: 'dd/mm/yyyy',
		    hiddenName: true
		})
	</script>
	<!-- ./JS -->
</body>
</html>