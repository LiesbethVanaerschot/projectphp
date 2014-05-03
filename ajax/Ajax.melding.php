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


		if ($gekozen == "afwezig")
		{
			$keuzeText ="";
			$feedback['keuze'] = $docent . " zal afwezig zijn op ";
		}
		elseif ($gekozen == "lokaal")
		{
			$feedback['keuze'] = $vak . " zal uitzonderlijk doorgaan in lokaal " . $keuzeText . ".";
		}
		else
		{
			$feedback['keuze'] = $vak . " - " . $docent . " : " . $keuzeText . ".";
		}


		$feedback['status'] = 'meldingOK';
		$feedback['vak'] = $vak;
		$feedback['docent'] = $docent;
	}

	echo json_encode($feedback);
?>