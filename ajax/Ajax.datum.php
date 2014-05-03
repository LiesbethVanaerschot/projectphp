<?php
	session_start();

	//zien of datum gepost is
	if (!empty($_POST['datum'])) {
		try {
			include_once ('../classes/Admin.class.php');

			$datum = $_POST['datum'];

			//weekdag (vrijdag, donderdag,..) uit de datum halen met explode
			$crumbs = explode(" ", $datum);
			$dag = $crumbs[0];

			//Sessie date starten zodat we de variabele dag terug in onze admin klasse krijgen
			$_SESSION['date'] = $dag;

			//vak en docent met query eruit halen
			$a = new Admin();
			$lesInfo = $a->getInfo();

			//loopen over het resultaat van de query
			while ($info = $lesInfo->fetch_assoc())
			{
				//resultaat in een array steken
				$lessen[] = $info['lesNaam'] . " / " . $info['docentNaam'];
			}

			$feedback['status'] = 'datumOK';
			$feedback['resultaat'] = $datum;
		}
		catch(Exception $e){
			$feedback['status'] = 'datumNOK';
			$feedback['message'] = $e->getMessage();
		}
	}
	else
	{
		$feedback['status'] = 'datumNOK';
		$feedback['message'] = 'Selecteer een datum!';
	}

	//array teruggeven naar js --> makkelijker loopen over lessen voor select list
	echo json_encode(array($lessen,$feedback));
?>