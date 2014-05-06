<?php
	if(isset($_POST['optionName'])){
		$selectedOption = $_POST['optionName'];
	}

	echo json_encode($selectedOption);
?>