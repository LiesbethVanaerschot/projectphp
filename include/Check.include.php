<?php
	session_start();
		//als sessie = true en datum is gegeven
	if (!isset($_SESSION['loggedin']) && !isset($_GET['datum']) && !isset($_GET['dag']) && !isset($_GET['selected']) && !isset($_GET['vak']) && !isset($_GET['docent']))
	{
		header("Location: personeel.php");
	}
	else
	{
		//uit url halen
		$dag = $_GET['dag'];
		$datum = $_GET['datum'];
		$selected = $_GET['selected'];
		$vak = $_GET['vak'];
		$docent = $_GET['docent'];

		if(isset($_GET['melding']))
		{
			$melding = $_GET['melding'];
		}
	}
?>