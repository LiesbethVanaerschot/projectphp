<?php
	include("Db.class.php");

	class User {

		private $m_sstudentRnummer;
		private $m_sstudentPaswoord;
		private $m_sDag;
		private $m_sStudent;

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

				case 'Student':
					$this->m_sStudent = $p_vValue;
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

				case 'Student':
					return $this->m_sStudent;
					break;	
			}
		}

		public function Find()
		{
			$db = new Db();
			$sql = "select * from tblstudent
					where studentRnummer ='".$db->conn->real_escape_string($this->m_sstudentRnummer)."'
					AND studentPaswoord = '".$db->conn->real_escape_string($this->m_sstudentPaswoord)."';";
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				
				$_SESSION['loggedin'] = true;
				
			}
			else
			{
				//nieuwe error opvangen
				throw new Exception("Studentennummer of paswoord is niet correct!");
				$_SESSION['loggedin'] = false;
			}
		}

		public function userName($nummer)
		{
			$db = new Db();
			$sql = "select studentID, studentVoornaam from tblstudent where studentRnummer ='" .$nummer. "';";
			$check = $db->conn->query($sql);
			return $check;
			var_dump($check);
		}

		public function getSchedule($dag, $rNummer)
		{
			$db = new Db();
			$sql = "SELECT *
					FROM tbldocent
					INNER JOIN tblles
						  ON (tbldocent.lesID = tblles.lesID)
						  INNER JOIN tblstudentles
						  		ON(tblles.lesID = tblstudentles.lesID)
					WHERE studentID IN
									(SELECT studentID 
									 FROM tblstudent 
									 WHERE studentRnummer = '".$rNummer."')
									 AND lesDag IN
											    (SELECT lesDag 
											     FROM tblles
											   	 WHERE lesDag = '" . $dag . "');";
			
			$schedule = $db->conn->query($sql);
			return $schedule;
		}
	}
?>
