<?php
	include_once('Admin.class.php');

	$a = new Admin();

	if(isset($_POST['melding'])){
		$selectedOption = $_POST['melding'];
		$a->Save();
	}

	echo json_encode($selectedOption);
?>