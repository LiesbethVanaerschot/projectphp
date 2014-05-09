<?php
	session_start();

	if (!isset($_SESSION['loggedin']) && !isset($_GET['nummer']) || !isset($_GET['pass']))
	{
		header("Location: personeel.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Melding - More schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href="css/classic.css" rel="stylesheet" />
	<link href="css/classic.date.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav> <!-- nav verschijnt als je inlogt -->
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

		<section id="loggedinAdmin">
				<div class="wrapper">
					<!-- php stuff here for personeel -->
					<div class="datum">
						<h2>Selecteer een datum:</h2>
						<form action="" method="post" class="datumSelect">
							<input type="text" class="datepicker" placeholder="Selecteer een datum..." name="datum">
						</form>
					</div>
				</div>

				<div id="feedbackDatum">
					<div class="wrapper">
						<p class="nokDatum"></p>
					</div>
				</div>
		</section><!-- End loggedin -->

		<section id="meldingen">
			<div class="wrapper">
				<!-- php stuff here for meldingen -->
				<div class="meldingScherm">
					<div class="opmerkingScherm cf">
						<form action="" method="POST" id="myForm">
							<label for="lesnaam" id="meld"><h3>Kies een vak</h3></label>
						 	<select id="selectDocent" name="option"><select>

							<label for="Melding"><h3>Melding <span class="smaller"></span></h3></label>
							<p>
								<input type="radio" name="melding" value="afwezig">Docent is afwezig
							</p>

							<p>
								<input type="radio" name="melding" value="lokaal">Lokaal is veranderd naar:
								<input type="text" name="lokaalText" id="lokaal" placeholder="K3/03">
							</p>

							<p>
								<input type="radio" name="melding" value="reden">Andere reden:
								<textarea placeholder="Geef een reden mee..." name="redenText" id='reden'></textarea>
							</p>

						</form>
					</div>

					<div id="feedbackMelding">
						<p class="nokMelding"></p>
					</div>
				</div>
			</div>

			<div class="arrow">
				<button type="submit" class="redirectAdmin" name="volgende">Maak melding<img src="images/hoverdown.png" alt="maak melding"></button>
			</div>
		</section><!-- End meldingen -->

		<section id="check">
			<div class="wrapper">
				<!-- php stuff here for check -->
				<h2>Mededeling</h2>
				<div class="check">
					<form method="POST" action=" " class="formCheck cf">
						<h2 class="meldingS"></h2><div class="datumCheck"></div>
						<input type="submit" name="btnCheck" id="btnCheck" value="Verzend">
					</form>
				</div>
			</div>
		</section><!-- End check -->

		<div id="feedbackCheck">
			<div class="wrapper">
				<p class="nokCheck"></p>
			</div>
		</div>
	</div><!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script>
		$('.datepicker').pickadate();
	</script>
	<script>
	$(document).ready(function(){
		//hiden
		$('#feedbackDatum').hide();
		$('#meldingen').hide();
		$('#feedbackMelding').hide();
		$('#check').hide();
		$('#feedbackCheck').hide();

		//ajax voor opmerkingscherm en datum
		$(".datepicker").on("change",function(e){
			$('#feedbackCheck').hide();

			//niet refreshen
   			e.preventDefault();

   			//variabelen
			var datum = $(".datepicker").val();

			//ajax
			var request = $.ajax({
	   			url: "ajax/Ajax.datum.php",
	   			type: "POST",
	   			data: {datum : datum},
	   			dataType: "json"
   			});
   			request.done(function(msg){
   				console.log(msg);
   				$('#feedbackDatum').slideUp();

   				if (msg[1].status == "datumOK")
   				{
   					$('#meldingen').slideDown("fast");

   					//datum
   					$(".smaller").html("(" + msg[1].resultaat + ")");
   					//hier datum van check al invullen (is nog wel hidden)
   					$('.datumCheck').html(msg[1].resultaat);


   					//eerst options resetten
   						$('#selectDocent').empty();
   						$('#selectDocent').append($("<option value='default' selected='selected' disabled>Kies een vak...</option>"));

   					//select list invullen
   					$.each(msg[0], function(position, value){
   						$('#selectDocent').append($("<option></option>")
   										  .attr("value", value)
   										  .text(value));
   					});
   				}
				else
				{
					$('.nokDatum').html(msg[1].message);
					$('#feedbackDatum').slideDown();
				}
   			});
		});

		//ajax voor values te checken
		$(".redirectAdmin").on("click", function(e){
			//niet refreshen
			e.preventDefault();

			//variabelen
			//welke docent/vak is er geselecteerd
			var vakDocentSelected = $('#selectDocent :selected').val();
			console.log(vakDocentSelected);
			//welke radio button is geselecteerd?
			var keuze = $('input[name=melding]:checked').val();

			if (keuze == "lokaal")
			{
				var lokaal = $('#lokaal').val();
				if(lokaal != "")
				{
					keuze += " " + lokaal;
				}
				else
				{
					keuze="";
				}
			}

			if (keuze == "reden")
			{
				var reden = $('#reden').val();
				if(reden != "")
				{
					keuze += " " + reden;
				}
				else
				{
					keuze="";
				}
			}
			console.log(keuze);

			//ajax
			var requestCheck = $.ajax({
	   			url: "ajax/Ajax.melding.php",
	   			type: "POST",
	   			data: {vakDocentSelected : vakDocentSelected, keuze : keuze},
	   			dataType: "json"
   			});
   			requestCheck.done(function(msg){
   				console.log(msg);
   				$('#feedbackMelding').slideUp();
   				$('.nokCheck').hide();

   				if (msg.status=='meldingOK')
   				{
   					$('#check').slideDown();
   					$('.meldingS').html(msg.keuze);
   				}
   				else
   				{
   					$('.nokMelding').html(msg.message);
   					$('#check').slideUp();
					$('#feedbackMelding').slideDown();
   				}
   			});
		});

		//ajax voor melding in db te schrijven
		$("#btnCheck").on("click",function(e){
			//niet refreshen
			e.preventDefault();

			$('.feedbackCheck').slideUp("");

			//variabelen
			var meldingWegschrijven = $(".meldingS").text();
			var weekdagWegschrijven = $(".datumCheck").text();

			//ajax
			var requestWegschrijven = $.ajax({
	   			url: "ajax/Ajax.wegschrijven.php",
	   			type: "POST",
	   			data: {meldingWegschrijven : meldingWegschrijven, weekdagWegschrijven : weekdagWegschrijven},
	   			dataType: "json"
   			});
   			requestWegschrijven.done(function(msg){
   				if(msg.status == 'ok'){
   					$('.nokCheck').slideDown();
					$('.nokCheck').html("<h2>" + msg.message + "</h2>");
   					$('#feedbackCheck').slideDown("slow");
   					$('#check').slideUp();
   				} else {
   					$('.nokCheck').slideDown();
   					$('.nokCheck').html("<h2>" + msg.message + "</h2>");
   					$('#feedbackCheck').slideDown();
   					$('#check').slideUp();
   				}
   			});
		});
	});
	</script>
	<!-- ./JS -->
</body>
</html>