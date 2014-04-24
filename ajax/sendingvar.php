<?php 
	include_once("../classes/User.class.php");

	$u = new User();
	if(!empty($_POST['dag']))
	{
		$dag = $_POST['dag'];

		$u->Dag = $_POST['dag'];
		$u->getSchedule(); 

		if(isset($i))
		{
			echo $i;
		}
	}
	//$dag = $_POST['dag'];
	//echo $dag;
	// hier query met dag die je hebt doorgegeven met ajax
	// dan terugsturen met json_encode
	// dan in student.php uitloopen met jquery
?>