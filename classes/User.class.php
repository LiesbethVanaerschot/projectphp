<?php
	include_once("classes/Db.class.php");

	class User {

		private $m_sUserid;
		private $m_sPassword;

		// moeten setters? we saven toch ni...

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'Userid':
					return $this->m_sUserid;
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
			$sql = "select * from tblUsers where userid ='" . $this->m_sUserid . "' AND password = '" . $this->m_sPassword . "';";
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				session_start();
				$_SESSION['loggedin'] = true;

				//echo "Login geslaagd";
				//header('Location: ???.php'); --> hier naar andere pagina gaan
			}
			else
			{
				throw new Exception("Username or password are not correct");
				$_SESSION['loggedin'] = false;
				//echo "Login niet geslaagd";
			}
		}

	}
?>