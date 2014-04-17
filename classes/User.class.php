<?php
	include_once("classes/Db.class.php");

	class User {

		private $m_sstudentRnummer;
		private $m_sstudentPaswoord;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'studentRnummer':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw studentennummer in!');
					} else {
						$this->m_sstudentRnummer = $p_vValue;
						break;
					}

				case 'studentPaswoord':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw paswoord in!');
					} else {
						$this->m_sstudentPaswoord = $p_vValue;
						break;
					}
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'studentRnummer':
					return $this->m_sstudentRnummer;
					break;

				case 'studentPaswoord':
					return $this->m_sstudentPaswoord;
					break;
			}
		}

		// zoeken naar user in database --> table en velden zijn nog niet correct!
		public function Find()
		{
			$db = new Db();
			$sql = "select * from tblstudent where studentRnummer ='" . $this->m_sstudentRnummer . "' AND studentPaswoord = '" . $this->m_sstudentPaswoord . "';";
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
				throw new Exception("Studentennummer of paswoord is niet correct!");
				$_SESSION['loggedin'] = false;
			}
		}

		public function userName()
		{
			$db = new Db();
			$sql = "select * from tblstudent where studentRnummer ='" . $_POST['studentRnummer'] . "';";
			$check = $db->conn->query($sql);
			return $check;
		}

	}
?>