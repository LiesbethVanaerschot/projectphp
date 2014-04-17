<?php
	// klasse Db --> database name nog aanpassen!
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "root";
<<<<<<< HEAD
		private $m_sPassword = "root";
		private $m_sDatabase = "project";
=======
		private $m_sPassword = "";
		private $m_sDatabase = "jijwilteenwebsi";
>>>>>>> 53dc2b9c66ea2d9be9073fe29132d559e50a8f63
		public $conn;

		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
	}

?>