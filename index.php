<?php
	// 1. Zien of post niet leeg is
	// 2. Zien of user in de databank zit
	// 3. ...

	$feedbackEr = "";
	$feedback = "";

	if(!empty($_POST))
	{
		try
		{
			include_once("classes/User.class.php");

			$u = new User();
			$u->Userid = $_POST['userid'];
			$u->Password = $_POST['password'];
			$u->Find();

		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav>
			<img src="images/imd.png" alt="logo">
		</nav> <!-- End nav -->

		<header>
			<div class="wrapper">
				<h1>MORE SCHEDULE</h1>
				<p>Kleine introductie?. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, ea, dignissimos, dolore commodi deserunt veniam vitae necessitatibus nemo aliquam similique adipisci tempore in nobis illo suscipit molestiae laudantium. Officiis, rerum, quas sequi impedit laboriosam ad numquam totam facere perferendis expedita nemo quo ratione ullam adipisci obcaecati repellat nulla sunt eaque?</p>
			</div> <!--  End header -->
		</header>

		<section id="login">
			<div class="wrapper">
				<h1 class="gray">LOGIN</h1>
				<form action="" method="post">
					<p class="cf">
						<label for="name">Userid</label>
						<input type="text" name="userid" id="userid" placeholder="r-nummer@kuleuven.be">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="password" id="password" placeholder="paswoord" >
					</p>
					<p class="cf">
						<input type="button" name="btnLogin" value="LOG IN">
					</p>
				</form>

				<div id="feedback">
					<p class="nok"><?php echo $feedbackEr; ?></p>
					<p class="ok"><?php echo $feedback; ?></p>
				</div>
			</div>
		</section><!-- End login -->
	</div> <!-- End container -->
</body>
</html>