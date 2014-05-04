<?php
	session_start();

	//empty?
	if (empty($_POST['vakDocentSelected'])) {
		$feedback['status'] = 'meldingNOK';
		$feedback['message'] = 'Selecteer een vak!';
	}

	if (empty($_POST['keuze'])) {
		$feedback['status'] = 'meldingNOK';
		$feedback['message'] = 'Melding niet juist ingevuld!';
	}

	//zien of variabelen gepost zijn
	if (!empty($_POST['vakDocentSelected']) && !empty($_POST['keuze'])) {

		$vakDocent = $_POST['vakDocentSelected'];
		$keuze = $_POST['keuze'];

		//vakDocent exploden [0] =  vak en [1] = docent
		$crumbs = explode(" / ", $vakDocent);
		$vak = $crumbs[0];
		$docent = $crumbs[1];

		//melding
		$crumbsKeuze = explode(" ", $keuze, 2);
		$gekozen = $crumbsKeuze[0];
		if (isset($crumbsKeuze[1])) {
			$keuzeText = $crumbsKeuze[1];
		}


		switch($gekozen)
		{
			case "afwezig";
				$keuzeText="";
				$feedback['keuze'] = $docent . " (" . $vak . ")" . " zal niet aanwezig zijn";
			break;

			case "lokaal";
				$feedback['keuze'] = $vak . " (" . $docent . ")" . " zal uitzonderlijk doorgaan in lokaal " . $keuzeText . ".";
			break;

			case "reden";
				$feedback['keuze'] = $vak . " (" . $docent . ") : " . $keuzeText . ".";
			break;
		}

		$feedback['status'] = 'meldingOK';
		$feedback['vak'] = $vak;
		$feedback['docent'] = $docent;
	}

	echo json_encode($feedback);
?>