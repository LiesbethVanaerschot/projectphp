<?php
	session_start();
		//als sessie = true en datum is gegeven
	if ($_SESSION['loggedin']!=true && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['maand']) && !isset($_GET['jaar'])) {
		header("Location: personeel.php");
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
		<section id="meldingen" <?php if(isset($_SESSION['loggedin'])){
											echo 'class="block"';
									 }
									 else{
									 		echo 'class="hidden"';
									 }
							   ?>>
			<div class="wrapper">
				<!-- php stuff here for meldingen -->
				<div class="meldingScherm">
					<?php
						if(isset($_SESSION['loggedin'])){
							include_once('classes/Admin.class.php');

							$a = new Admin();
							$lesInfo = $a->getInfo();
					?>
						<div class='vakken'>
							<form action="" method="post">
								<label for="lesnaam"><h2>Kies een vak</h2></label>
						 		<select id="select" onchange="getOption(this.value)">
									<option value='default' selected='selected' disabled>Kies een vak...</option>
									<?php
										while ($info = $lesInfo->fetch_assoc()){
	                             			echo "<option value='" . $info['lesNaam'] . " (" . $info['docentNaam'] . ") '>" .  $info['lesNaam'] . " / " . $info['docentNaam'] . "</option>";
										}
									?>
								<select>
							</form>
						</div>


				<h2><div id="vakOption"></div></h2>

				<div class="opmerkingScherm hidden">
					<form action="" method="post">
						<label for="Melding"><h3>Melding</h3></label>
						<p>
							<input type="radio" name="melding">Docent is afwezig
						</p>

						<p>
							<input type="radio" name="melding">Lokaal is veranderd naar:
							<input type="text" name="lokaal">
						</p>

						<p>
							<input type="radio" name="melding">Andere reden:
							<textarea name="reden"> </textarea>
						</p>

					</form>
				</div>
					<?php } ?>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
	$("#select").on('change', function(){
		$(".opmerkingScherm").removeClass('hidden');
		$(".opmerkingScherm").addClass('block');
	});

	function getOption(opt){
			if (opt == ""){
				document.getElementById("vakOption").innerHTML="";
			}
			else {
				document.getElementById("vakOption").innerHTML= opt;
			}
		}
	</script>
	<!-- ./JS -->
</body>
</html>