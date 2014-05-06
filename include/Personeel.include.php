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

			header('Location: adminSide.php?nummer=' . $_POST['personeelsNummer'] . '&pass=' . $_POST['paswoord']);
		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?>