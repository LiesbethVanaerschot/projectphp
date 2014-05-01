<?php
	session_start();
		//als sessie = true en datum is gegeven
	if ($_SESSION['loggedin']!=true && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['maand']) && !isset($_GET['jaar']) && !isset($_GET['selected']) && !isset($_GET['vak']) && !isset($_GET['docent'])) 
	{
		header("Location: personeel.php");
	}
	else
	{
		//uit url halen
		$datum = $_GET['datum'];
		$dag = $_GET['dag'];
		$maand = $_GET['maand'];
		$jaar = $_GET['jaar'];
		$selected = $_GET['selected'];
		$vak = $_GET['vak'];
		$docent = $_GET['docent'];
		
		if(isset($_GET['melding']))
		{
			$melding = $_GET['melding'];
		}
	}
?>