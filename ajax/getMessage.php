<?php
	include_once('Admin.class.php');

	if(isset($_POST['melding'])){
		try {
			$a = new Admin();
			$a->Melding = $_POST['melding'];
			$melding = $a->Save();
		}
		catch(Exception $e){
			$feedbackEr = $e->getMessage();
		}
	}

	echo json_encode($melding);
?>