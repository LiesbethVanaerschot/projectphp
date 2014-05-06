<h3 id="student-meldingen">Meldingen</h3>
	<!-- 
		QUERY VOOR MELDINGEN:
		
		SELECT melding FROM tblmelding ORDER BY melding ASC 
	-->
<?php
	include_once("./classes/Melding.class.php");
				$melding = new Melding();
				$res = $melding->getAll();

				echo "<p class='meldingentitel'>Meldingen</p>";

				echo "<ul id='meldingen-lijst'>";

					while($result = $res->fetch_assoc())
					{
						echo "<li class='melding-row'>";
						echo "<ul class='meldingen-melding'>";
						echo "<li class='melding-melding'>".$result['melding']."</li>";
						echo "</ul>";
						echo "</li>";
					}		
						
					echo "</ul>";
?>