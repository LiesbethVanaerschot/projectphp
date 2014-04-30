<?php
	include_once('Admin.class.php');

	$a = new Admin();

	if(isset($_POST['melding'])){
		$doorgeven = $_POST['melding'];
		$a->Melding = $_POST['melding'];
		$melding = $a->Save();

		if(isset($melding))
		{
			echo $melding;
		}
	}
?>