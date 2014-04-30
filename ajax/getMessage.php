<?php
	session_start();


	include_once('../classes/Melding.class.php');

	if(!empty($_POST['check'])){
		try {
			$m = new Melding();
			$m->Melding = $_POST['check'];
			$resultaat = $m->Save();

			$feedback['status'] = 'ok';
			$feedback['message'] = 'Melding succesvol toegevoegd!';
		}
		catch(Exception $e){
			$feedback['status'] = 'nok';
			$feedback['message'] = $e->getMessage();
		}
	}

	echo json_encode($feedback);
?>