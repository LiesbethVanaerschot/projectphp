<?php
	include_once("classes/Db.class.php");

	class User {

		private $m_sEmail;
		private $m_sPassword;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'Email':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw studentennummer in!');
					} else {
						$this->m_sEmail = $p_vValue;
						break;
					}

				case 'Password':
					if(empty($p_vValue)){
						throw new Exception ('Vul uw paswoord in!');
					} else {
						$this->m_sPassword = $p_vValue;
						break;
					}
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'Email':
					return $this->m_sEmail;
					break;

				case 'Password':
					return $this->m_sPassword;
					break;
			}
		}

		// zoeken naar user in database --> table en velden zijn nog niet correct!
		public function Find()
		{
			$db = new Db();
			$sql = "select * from tblusers where email ='" . $this->m_sEmail . "' AND password = '" . $this->m_sPassword . "';";
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

	}
?>