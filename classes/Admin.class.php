<?php
	include_once("classes/Db.class.php");

	class Admin {

		private $m_sANummer;
		private $m_sAPaswoord;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'ANummer':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw personeelsnummer in!');
					} else {
						$this->m_sANummer = $p_vValue;
						break;
					}

				case 'APaswoord':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw wachtwoord in!');
					} else {
						$this->m_sAPaswoord = $p_vValue;
						break;
					}
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'ANummer':
					return $this->m_sANummer;
					break;

				case 'APaswoord':
					return $this->m_sAPaswoord;
					break;
			}
		}

		public function Find()
		{
			$db = new Db();
			$sql = "SELECT * FROM tblAdmin
					where adminUnummer = '".$db->conn->real_escape_string($this->m_sANummer)."'
					AND adminPaswoord = '".$db->conn->real_escape_string($this->m_sAPaswoord)."';";
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				session_start();
				$_SESSION['loggedin'] = true;
			}
			else
			{
				//nieuwe error opvangen
				throw new Exception("Personeelsnummer of wachtwoord is niet correct!");
				$_SESSION['loggedin'] = false;
			}
		}

		public function getInfo()
		{
			$db = new Db();

			$dag = $_GET['datum'];

			$sql = "SELECT DISTINCT lesNaam, docentNaam
					FROM tblles
					INNER JOIN tbldocent
						ON (tblles.lesID = tbldocent.lesID)
					where lesDag = '" . $dag . "';";

			$lesdag = $db->conn->query($sql);
			return $lesdag;
		}
// voor doceent en les tegelijk
// SELECT lesNaam, docentNaam
// FROM tblLes
// 	 INNER JOIN tblDocent ON (tblLes.lesID = tblDocent.lesID)
// WHERE lesDag="dinsdag";


// enkel docenten
// SELECT docentNaam
// FROM tblLes
// 	 INNER JOIN tblDocent ON (tblLes.lesID = tblDocent.lesID)
// WHERE lesDag="dinsdag";

//enkel vakken
// select lesNaam
// from tblLes
// where lesDag="dinsdag";
	}
?>