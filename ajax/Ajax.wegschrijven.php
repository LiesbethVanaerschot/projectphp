<?php
	session_start();

	include_once('../classes/Melding.class.php');

	if(!empty($_POST['meldingWegschrijven']) && !empty($_POST['weekdagWegschrijven'])){
		try {
			$melding = $_POST['meldingWegschrijven'];
			$datum = $_POST['weekdagWegschrijven'];
			$crumbs = explode( " ", $datum );

			$heleMelding = $crumbs[1] . " (" . $crumbs[0] . ")" . " - " . $melding;

			$m = new Melding();
			$m->Melding = $heleMelding;
			$resultaat = $m->Save();

			$feedback['status'] = 'ok';
			$feedback['message'] = 'Melding is succesvol toegevoegd!';
		}
		catch(Exception $e){
			$feedback['status'] = 'nok';
			$feedback['message'] = $e->getMessage();
		}
	}

	echo json_encode($feedback);
?>