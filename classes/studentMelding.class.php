<?php
	include_once("Db.class.php");

	class studentMelding
	{
		public function getAll()
		{
			$db = new Db();
			$sql = "select * from tblmelding order by meldingID ASC;";
			$result = $db->conn->query($sql);

			return $result;
		}

	}	