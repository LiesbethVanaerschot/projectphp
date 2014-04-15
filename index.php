<?php
	// feedback en session een default waarde geven
	$feedbackEr = "";
	$_SESSION['loggedin'] = false;

	// Zien of post niet leeg is en user uit databank halen
	if(!empty($_POST))
	{
		try
		{
			include_once("classes/User.class.php");

			$u = new User();
			$u->Email = $_POST['email'];
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
		<nav <?php 	if($_SESSION['loggedin'] == false){
						echo 'class="hidden"';
				  	}
				  	else
				  	{
				  		echo 'class="block"';
				  	}
			  ?>> <!-- nav verschijnt als je inlogt -->
			<a href="logout.php">LOG OUT</a>
		</nav> <!-- End nav -->

		<header>
			<h1>MoreSchedule</h1>
		</header> <!--  End header -->

		<section id="login" <?php if($_SESSION['loggedin'] == true){
										echo 'class="hidden"';
								  }
							?>> <!-- als je inlogt dan moet de loginform verdwijnen -->
			<div class="wrapper">
				<h1 class="gray">Login</h1>
				<h2>Importeer de tblusers</h2>
				<h2>email=r0417768 of r0382075 && pw=test123</h2>
				<form action="" method="post">
					<p class="cf">
						<label for="name">Studentennummer</label>
						<input type="text" name="email" id="email" placeholder="r0382075">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="password" id="password" placeholder="paswoord" >
					</p>
					<p class="cf">
						<input type="submit" name="btnLogin" value="LOG IN">
					</p>
				</form>

				<div id="feedback">
					<p class="nok"><?php echo $feedbackEr; ?></p>
				</div>
			</div>
		</section><!-- End login -->

		<section id="loggedin" <?php if($_SESSION['loggedin'] == false){
											echo 'class="hidden"';
									 }
									 else{
									 		echo 'class="block"';
									 }
							   ?>>
			<div class="wrapper">
				<h1>Kies uw klas!</h1>

				<table> <!-- hier alle klassen geven met php eventueel? zodat we niet altijd moete copy pasten -->
					<tr>
						<td><a href="#">1IMDa</a></td>
					</tr>
					<tr>
						<td><a href="#">1IMDb</a></td>
					</tr>
					<tr>
						<td><a href="#">1IMDc</a></td>
					</tr>
					<tr>
						<td><a href="#">2IMDa</a></td>
					</tr>
					<tr>
						<td><a href="#">2IMDb</a></td>
					</tr>
					<tr>
						<td><a href="#">3IMDa</a></td>
					</tr>
				</table>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->
</body>
</html>