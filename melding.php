<?php
	session_start();
		//als sessie = true en datum is gegeven
	if ($_SESSION['loggedin']!=true && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['maand']) && !isset($_GET['jaar'])) {
		header("Location: personeel.php");
	}

	//radiolist
	$afwezig = 'unchecked';
	$lokaal = 'unchecked';	
	$reden = 'unchecked';

	if (isset($_POST['btnMelding']))
	{
		$selected_radio=$_POST['melding'];

		if ($selected_radio == 'afwezig') 
		{
				$afwezig = 'checked';
		}
		else if ($selected_radio == 'lokaal') 
		{
			$lokaal = 'checked';
		}
		else if ($selected_radio == 'reden') 
		{
			$reden = 'checked';
			header('Location: melding.php?melding=' . $selected_radio . "&checked=" . $reden);
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
							<form action="" method="POST">
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

				<div class="opmerkingScherm hidden cf">
					<form action="" method="POST">
						<label for="Melding"><h3>Melding</h3></label>
						<p>
							<input type="radio" name="melding" value="afwezig">Docent is afwezig
						</p>

						<p>
							<input type="radio" name="melding" value="lokaal">Lokaal is veranderd naar:
							<input type="text" name="lokaal">
						</p>

						<p>
							<input type="radio" name="melding" value="reden">Andere reden:
							<textarea name="reden"> </textarea>
						</p>

						<input type="submit" name="btnMelding" id="btnMelding" value="Maak melding">
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