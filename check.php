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
					<li class="logout"><a href="logout.php">Uitloggen</a></li>
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
					<form method="POST" action=" " class="formCheck cf">
							<?php if ($selected == 'afwezig') { ?>
								<p class="meldingS"><?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?> - <?php echo "$docent ($vak)"; ?> zal niet aanwezig zijn</p>
							<?php } ?>

							<?php if ($selected == 'lokaal') { ?>
								<p class="meldingS"><?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?> - <?php echo "$vak"; ?> zal uitzonderlijk doorgaan in <?php echo $melding; ?></p>
							<?php } ?>

							<?php if ($selected == 'reden') { ?>
								<p class="meldingS"><?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?> - <?php echo $melding ?></p>
							<?php } ?>

							<input type="submit" name="btnCheck" id="btnCheck" value="Verzend">
					</form>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#btnCheck").on("click",function(){
			var melding = $(".meldingS").html();

			var request = $.ajax({
	   			url: "./ajax/getMessage.php",
	   			type: "POST",
	   			data: {melding : melding},
	   			dataType: "html"
   			});
   			request.done(function(msg){
   				console.log(msg);
   				console.log("succes!");
   			});
		});
	});
	</script>

	<!-- ./JS -->
</body>
</html>