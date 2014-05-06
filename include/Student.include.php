<?php
	//includen
	session_start();
	include_once("classes/User.class.php");

	// Zien of post niet leeg is en user uit databank halen
	if(!empty($_POST))
	{
		try
		{
			$u = new User();
			$u->studentRnummer = $_POST['studentRnummer'];
			$u->studentPaswoord = $_POST['studentPaswoord'];
			$u->Find();

			header('Location: studentSide.php?nummer=' . $_POST['studentRnummer']);
		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?>