<?php
	include ('classes/Melding.include.php')
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
						}
					?>
					<!-- <div class='vakken'>
						<form action="" method="POST" >
							<label for="lesnaam"><h2>Kies een vak</h2></label>
						 	<select id="selectDocent" name="option">
								<option value='default' selected='selected' disabled>Kies een vak...</option>
									<?php
										//while ($info = $lesInfo->fetch_assoc()){
	                             		//	echo "<option value='" . $info['lesNaam'] . " / " . $info['docentNaam'] . "'>" .  $info['lesNaam'] . " / " . $info['docentNaam'] . "</option>";
										//}
									?>
							<select>
						</form>
					</div> -->


					<h2><div id="vakOption"></div></h2>

					<div class="opmerkingScherm cf">
						<form action="" method="POST">
							<label for="lesnaam"><h2>Kies een vak</h2></label>
						 	<select id="selectDocent" name="option">
								<option value='default' selected='selected' disabled>Kies een vak...</option>
									<?php
										while ($info = $lesInfo->fetch_assoc()){
	                             			echo "<option value='" . $info['lesNaam'] . " / " . $info['docentNaam'] . "'>" .  $info['lesNaam'] . " / " . $info['docentNaam'] . "</option>";
										}
									?>
							<select>

							<label for="Melding"><h3>Melding <span class="smaller">(<?php echo $datum . " " . $dag . " " . $maand . " " . $jaar; ?>)</span></h3></label>
							<p>
								<input type="radio" name="melding" value="afwezig">Docent is afwezig
							</p>

							<p>
								<input type="radio" name="melding" value="lokaal">Lokaal is veranderd naar:
								<input type="text" name="lokaalText" placeholder="K3/03">
							</p>

							<p>
								<input type="radio" name="melding" value="reden">Andere reden:
								<textarea name="redenText" placeholde="Wat is uw reden?"> </textarea>
							</p>

							<input type="submit" name="btnMelding" id="btnMelding" value="Maak melding">
						</form>
					</div>

					<?php if (isset($feedback)) { ?>
						<div id="feedback">
							<p class="nok"><?php echo $feedback; ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#selectDocent").on("change",function(e){
				e.preventDefault();

				$(".opmerkingScherm").slideDown();

				var optionName = $("#selectDocent option:selected").val();

				var request = $.ajax({
					url: "ajax/getOption.php",
					type: "POST",
					data: {optionName : optionName},
					dataType: "json"
				});

				request.done(function(msg){
					$('#vakOption').html(msg)
				});
			});
		});
	</script>
	<!-- ./JS -->
</body>
</html>