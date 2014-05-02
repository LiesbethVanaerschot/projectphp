<?php
	session_start();
	//als sessie = true en datum is gegeven
	if (!isset($_SESSION['loggedin']) && !isset($_GET['datum']) && !isset($_GET['dag']))
	{
			header("Location: personeel.php");
	}

	else
	{
		$datum = $_GET['datum'];
		$dag = $_GET['dag'];

		//checken of btnmelding gepost is
		if (isset($_POST['btnMelding']))
		{
			//checken of er een radiobutton is aangeklikt
			if (isset($_POST['melding']))
			{
				$vakDocent = $_POST['option'];
				$crumbs = explode("/", $vakDocent);
				$vak = $crumbs[0];
				$docent = $crumbs[1];

				//radio dat geselecteerd is in variabele schrijven
				$selected_radio=$_POST['melding'];

				//inputvelden in variabele schrijven
				$anderLokaal=$_POST['lokaalText'];
				$andereReden=$_POST['redenText'];

				if ($selected_radio == 'afwezig')
				{
					header('Location: check.php?dag=' . $dag . '&datum=' . $datum . '&selected=' . $selected_radio . "&vak=" . $vak . "&docent=" . $docent);
				}

				//trim om spaces te verwijderen (anders konden ze gwn spaties invoeren en toch nog doorgaan)
				if ($selected_radio == 'lokaal' && trim($anderLokaal) != "")
				{
					header('Location: check.php?dag=' . $dag . '&datum=' . $datum . '&selected=' . $selected_radio .'&melding=' . $anderLokaal . "&vak=" . $vak . "&docent=" . $docent);
				}

				//zelfde hier met trim
				if ($selected_radio == 'reden' && trim($andereReden) != "")
				{
					header('Location: check.php?dag=' . $dag . '&datum=' . $datum . $jaar . '&selected=' . $selected_radio . '&melding=' . $andereReden . "&vak=" . $vak . "&docent=" . $docent);
				}
			}
			else
			{
				$feedback = "Gelieve alles in te vullen!";
			}
		}
	}
?>