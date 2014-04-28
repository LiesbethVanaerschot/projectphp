<?php
	if(!empty($_POST['btnLogin']))
	{
		try
		{
			include_once("classes/Admin.class.php");

			$a = new Admin();
			$a->ANummer = $_POST['personeelsNummer'];
			$a->APaswoord = $_POST['paswoord'];
			$a->Find();

		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}

	if(!empty($_POST['volgende']))
	{
		try {
			$datum = $_POST['datum'];
			$crumbs = explode(" ", $datum);
			if (isset($crumbs)){
				header("location: melding.php?datum=" . $crumbs[0] . "&dag=" . $crumbs[1] . "&maand=" . $crumbs[2] . "&jaar=" . $crumbs[3]);
			}
		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?>