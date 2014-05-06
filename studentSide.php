<?php
	session_start();
	include_once('classes/User.class.php');
	if (isset($_SESSION['loggedin']) && isset($_GET['nummer']))
	{
		$u = new User();
		$nummer = $_GET['nummer'];
		echo $nummer;
		$user = $u->userName($nummer);
	}
	else
	{
		header("Location: student.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav> <!-- nav verschijnt als je inlogt -->
			<div class="wrapper cf">
				<ul>
					<li class="welkom">Welkom
					<?php
						if(isset($user)){
							
							while ($row = $user->fetch_assoc()){
								// $id = $row['studentID'];
								echo "<strong class='user'>" . $row['studentVoornaam'] . "</strong>";
								// echo $id;
							}
						}
					?>
					</li>
					<li class="logout"><a href="logout.php">Uitloggen</a></li>
				</ul>
			</div>
		</nav> <!-- End nav -->

		<section id="loggedin" >
			<!-- als er geklikt wordt op rooster moet de div div-meldingen verborgen worden en omgekeerd -->
			<div class="tabbladen">
				<ul>
					<li class="active-tab-rooster"><a href="#">ROOSTER</a></li>
					<li class="active-tab-meldingen"><a href="#">MELDINGEN</a></li>
				</ul>
			</div>


			<div id="div-rooster" class="wrapper clear">
				<?php include_once("include/StudentTabel.include.php"); ?>
			</div>

			<div id="div-meldingen" class="wrapper clear" style="display:none">
				<?php include_once("include/StudentMeldingen.include.php"); ?>

			</div>

		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src ="js/script.js"></script>


</body>
</html>