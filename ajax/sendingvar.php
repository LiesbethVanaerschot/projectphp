<?php 
	include_once("../classes/User.class.php");

	$u = new User();
	if(!empty($_POST['dag']))
	{
		$dag = $_POST['dag'];
		$rNummer = $_POST['rNummer'];
		$schedule = $u->getSchedule($dag, $rNummer); 
		//var_dump($schedule);
		if(isset($schedule)){
			$array = array();
			while($key = mysqli_fetch_array($schedule,MYSQLI_ASSOC))
			{
				$array[] = $key;
				
			}
			//var_dump($array);
			$les = json_encode($array);
			echo $les;
		}
	}
	//$dag = $_POST['dag'];
	//echo $dag;
	// hier query met dag die je hebt doorgegeven met ajax
	// dan terugsturen met json_encode
	// dan in student.php uitloopen met jquery
?>