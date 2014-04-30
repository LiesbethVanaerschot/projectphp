<?php
	include_once("Db.class.php");

	class Melding
	{
		private $m_sMelding;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
			{
				case 'Melding':
					$this->m_sMelding = $p_vValue;
					break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty)
			{
				case 'Melding':
					return $this->m_sMelding;
					break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "INSERT INTO tblmelding(melding)
					VALUES(
						'" . $this->m_sMelding . "')";

			$resultaat = $db->conn->query($sql);
			return $resultaat;
		}
	}
?>