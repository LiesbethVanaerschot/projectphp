<?php
	// feedback en session een default waarde geven
	$feedbackEr = "";

	//includen
	include("classes/User.class.php");

	// Zien of post niet leeg is en user uit databank halen
	if(!empty($_POST))
	{
		try
		{
			$u = new User();
			$u->studentRnummer = $_POST['studentRnummer'];
			$u->studentPaswoord = $_POST['studentPaswoord'];
			$u->Find();

		} catch (Exception $e) {
			$feedbackEr = $e->getMessage();
		}
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student - More Schedule</title>
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/screen.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<nav <?php 	if(isset($_SESSION['loggedin'])){
						echo 'class="block"';
				  	}
				  	else
				  	{
				  		echo 'class="hidden"';
				  	}
			  ?>> <!-- nav verschijnt als je inlogt -->
			<div class="wrapper cf">
				<ul>
					<li class="welkom">Welkom
					<?php
						if(isset($_SESSION['loggedin'])){

							$user = $u->userName();

							while ($row = $user->fetch_assoc()){
								// $id = $row['studentID'];
								echo '<strong>' . $row['studentVoornaam'] . '</strong>';
								// echo $id;
							}
						}
					?>
					</li>
					<li class="logout"><a href="logout.php">LOG OUT</a></li>
				</ul>
			</div>
		</nav> <!-- End nav -->

		<header>
			<h1>MoreSchedule</h1>
		</header> <!--  End header -->

		<!---wat nu nog zou moeten gebeuren is template week table of dag table, aparte queries die mooi per dag tonen welke les je hebt, grijs wnr er geen les is.---->

		<section id="login" <?php if(isset($_SESSION['loggedin'])){
										echo 'class="hidden"';
								  }
							?>> <!-- als je inlogt dan moet de loginform verdwijnen -->
			<div class="wrapper">
				<h1>Login</h1>
				<form action="" method="post">
					<p class="cf">
						<label for="name">Studentennummer</label>
						<input type="text" name="studentRnummer" id="studentRnummer" placeholder="r0123456">
					</p>
					<p class="cf">
						<label for="password">Paswoord</label>
						<input type="password" name="studentPaswoord" id="studenPaswoord" placeholder="paswoord" >
					</p>
					<p class="cf">
						<input type="submit" name="btnLogin" value="LOG IN">
					</p>
				</form>

				<?php if ($feedbackEr != ""){ ?>
					<div id="feedback">
						<p class="nok"><?php echo $feedbackEr; ?></p>
					</div>
				<?php } ?>
			</div>
		</section><!-- End login -->

		<section id="loggedin" <?php if(isset($_SESSION['loggedin'])){
											echo 'class="block"';
									 }
									 else{
									 		echo 'class="hidden"';
									 }
							   ?>>
			<div class="wrapper">
				<div id="dagnav">
					<div id="prev"></div>
					<h3 id="dag"></h3><!-- DAG moet vervangen worden door dagen van de week -->
					<div id="next"></div>
				</div>
				<!-- php stuff here -->
				<table class="lessenrooster">
                    <thead>
                      <tr>
                        <th>Dag</th>
                        <th>Beginuur</th>
                        <th>Einduur</th>
                        <th>Les</th>
                        <th>Lokaal</th>
                        <th>Docent</th>
                      </tr>
                      <tr>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
						if(isset($_SESSION['loggedin'])){
							$les = $u->getUurrooster();

							while ($data = $les->fetch_assoc()){
								echo "<tr>";
                             		echo "<td>" . $data['lesDag'] . "</td>";
                            		 echo "<td>" . $data['lesBegin'] . "</td>";
                            		 echo "<td>" . $data['lesEind'] . "</td>";
                            		 echo "<td>" . $data['lesNaam'] . "</td>";
                            		 echo "<td>" . $data['lesLokaal'] . "</td>";
                            		 echo "<td>" . $data['docentNaam'] . "</td>";
                         	 echo "</tr>";
							}
						}
							
					?>
                    </tbody>
                  </table>
 				<?php 
 					echo "<h1>HELP</h1>";
					if(isset($_REQUEST['dag'])){
						$dag = $_REQUEST['dag'];
						echo "<p>" . $dag . "</p>";
					}	
				?>
			</div>
		</section><!-- End loggedin -->
	</div> <!-- End container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src ="js/script.js"></script>
	<!-- ./JS -->
</body>
</html>

<!-- select * from tblstudentles INNER JOIN tblles on(tblstudentles.lesID = tblles.lesID)-->
<!-- select * from tblstudentles INNER JOIN tblles on(tblstudentles.lesID = tblles.lesID) where studentID = 1-->
<!-- select tbldocent.lesID, tblles.lesID, docentNaam from tbldocent INNER JOIN tblles on(tbldocent.lesID = tblles.lesID)-->
<!-- select tbldocent.lesID, tblles.lesID, lesNaam, lesBegin, lesEind, docentNaam from tbldocent INNER JOIN tblles on(tbldocent.lesID = tblles.lesID)-->
<!-- select tbldocent.lesID, tblles.lesID, lesNaam, lesBegin, lesEind, docentNaam, lesDag from tbldocent 
INNER JOIN tblles on(tbldocent.lesID = tblles.lesID) INNER JOIN tblstudentles 
on(tblles.lesID = tblstudentles.lesID) where studentID IN ( select studentID from tblstudent where studentRnummer = 'r0330949')-->
<!-- 
	QUERIES VOOR TEMPLATE

	query die les voor r0330949 per dag selecteert:
	select tbldocent.lesID, tblles.lesID, lesNaam, docentNaam 
	from tbldocent 
	INNER JOIN tblles on(tbldocent.lesID = tblles.lesID)
	INNER JOIN tblstudentles on(tblles.lesID = tblstudentles.lesID)
	where studentID IN(select studentID from tblstudent where studentRnummer = 'r0330949')
	AND
	lesDag IN(select lesDag from tblles where lesDag = 'dinsdag');
	(per uur is gwn nog eens AND beginUur IN (...))

	SELECT lesNaam, tblles.lesID
	from tblles
	INNER JOIN tblstudentles 
	ON (tblles.lesID = tblstudentles.lesID)
	where studentID IN
	(select studentID from tblstudent where studentRnummer = 'r0330949')
	AND
	(lesBegin = '08:30' OR lesEind = '08:30')
	AND
	lesDag IN (select lesDag from tblles where lesDag = 'dinsdag');

	lesDag is var die uit dagnav komt.
	studentRnummer komt uit input bij aanmelden.
-->