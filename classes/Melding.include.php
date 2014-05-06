<?php
	session_start();
			//als sessie = true en datum is gegeven
		if ($_SESSION['loggedin']!=true && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['maand']) && !isset($_GET['jaar'])) {
			header("Location: personeel.php");
		}

		//radiolist
		$datum = $_GET['datum'];
		$dag = $_GET['dag'];
		$maand = $_GET['maand'];
		$jaar = $_GET['jaar'];

		//checken of btnmelding gepost is
		if (isset($_POST['btnMelding']))
		{

			$vakDocent = $_POST['option'];
			$crumbs = explode("/", $vakDocent);
			$vak = $crumbs[0];
			$docent = $crumbs[1];

			//checken of er een radiobutton is aangeklikt
			if (isset($_POST['melding']))
			{
				//radio dat geselecteerd is in variabele schrijven
				$selected_radio=$_POST['melding'];

				//inputvelden in variabele schrijven
				$anderLokaal=$_POST['lokaalText'];
				$andereReden=$_POST['redenText'];

				if ($selected_radio == 'afwezig')
				{
					// $afwezig = 'checked';
					// echo $afwezig . " ";
					// echo $selected_radio;
					header('Location: check.php?datum=' . $datum . '&dag=' . $dag . '&maand=' . $maand . '&jaar=' . $jaar . '&selected=' . $selected_radio . "&vak=" . $vak . "&docent=" . $docent);
				}

				//trim om spaces te verwijderen (anders konden ze gwn spaties invoeren en toch nog doorgaan)
				if ($selected_radio == 'lokaal' && trim($anderLokaal) != "")
				{
					// $lokaal = 'checked';
					// echo $lokaal . " ";
					// echo $selected_radio . " ";
					// echo $anderLokaal;
					header('Location: check.php?datum=' . $datum . '&dag=' . $dag . '&maand=' . $maand . '&jaar=' . $jaar . '&selected=' . $selected_radio .'&melding=' . $anderLokaal . "&vak=" . $vak . "&docent=" . $docent);
				}

				//zelfde hier met trim
				if ($selected_radio == 'reden' && trim($andereReden) != "")
				{
					// $reden = 'checked';
					// echo $reden . " ";
					// echo $selected_radio . " ";
					// echo $andereReden;
					header('Location: check.php?datum=' . $datum . '&dag=' . $dag . '&maand=' . $maand . '&jaar=' . $jaar . '&selected=' . $selected_radio . '&melding=' . $andereReden . "&vak=" . $vak . "&docent=" . $docent);
				}
				//
			} else {
				$feedback = "Vul alles in!";
			}
		}
?>