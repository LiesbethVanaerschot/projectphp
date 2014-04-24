<?php
	include("Db.class.php");

	class User {

		private $m_sstudentRnummer;
		private $m_sstudentPaswoord;
		private $m_sDag;

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

				case 'Dag':
					$this->m_sDag = $p_vValue;
					break;	
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

				case 'Dag':
					return $this->m_sDag;
					break;	
			}
		}

		// zoeken naar user in database --> table en velden zijn nog niet correct!
		public function Find()
		{
			$db = new Db();
			$sql = "select * from tblstudent
					where studentRnummer ='".$db->conn->real_escape_string($this->m_sstudentRnummer)."'
					AND studentPaswoord = '".$db->conn->real_escape_string($this->m_sstudentPaswoord)."';";
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
			$sql = "select studentID, studentVoornaam from tblstudent where studentRnummer ='" . $_POST['studentRnummer'] . "';";
			$check = $db->conn->query($sql);
			return $check;
		}

		/*public function getID()
		{
			$db = new Db();
			$sql = "select studentID from tblstudent where studentRnummer ='" . $_POST['studentRnummer'] . "';";
			$id = $db->conn->query($sql);
			print_r($id);
			return $id;
		}*/

		public function getUurrooster()
		{
			$db = new Db();
			$sql = "select tbldocent.lesID, tblles.lesID, lesNaam, lesBegin, lesEind, docentNaam, lesDag, lesLokaal
					from tbldocent
					INNER JOIN tblles
					on(tbldocent.lesID = tblles.lesID)
					INNER JOIN tblstudentles on(tblles.lesID = tblstudentles.lesID)
					where studentID IN
					(select studentID 
						from tblstudent
						where studentRnummer ='" . $_POST['studentRnummer'] . "');";/*" . mysqli_insert_id($id) ."*/
			$rooster = $db->conn->query($sql);
			return $rooster;
		}

		public function getSchedule()
		{
			$db = new Db();
			$sql = "select lesNaam, tblles.lesID
					from tblles
					INNER JOIN tblstudentles
					ON (tblles.lesID = tblstudentles.lesID)
					where studentID IN
					(select studentID from tblstudent where studentRnummer = 'r0330949')
					AND
					lesDag IN
					(select lesDag from tblles where lesDag = '" . $db->conn->real_escape_string($this->m_sDag) . "');";
			
			$schedule = $db->conn->query($sql);
			var_dump($schedule);
			$i = json_encode($schedule);
			var_dump($i);
		}
	}
?>
