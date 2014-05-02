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

		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}

	if(!empty($_POST['volgende']))
	{
		if(!empty($_POST['datum']))
		{
			$datum = $_POST['datum'];
			$crumbs = explode(" ", $datum);
			if (isset($crumbs)){
				header("location: melding.php?datum=" . $crumbs[0] . "&dag=" . $crumbs[1] . "&maand=" . $crumbs[2] . "&jaar=" . $crumbs[3]);
			}
		}
		else {
			session_start();


		}
	}

	header("ETag: PUB" . time());
	header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()-10) . " GMT");
	header("Expires: " . gmdate("D, d M Y H:i:s", time() + 5) . " GMT");
	header("Pragma: no-cache");
	header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
	session_cache_limiter("nocache");
?>