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

		// zoeken naar user in database --> table en velden zijn nog niet correct!
		public function Find()
		{
			$db = new Db();
			$sql = "select * from tblAdmin 
					where adminUnummer = '".$db->conn->real_escape_string($this->m_sANummer)."' 
					AND adminPaswoord = '".$db->conn->real_escape_string($this->m_sAPaswoord)."';";
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				//sessie starten en sessie loggedin op true zetten
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

	}
?>