<?php

	class Db {
		
		private $m_rHost="localhost";
		private $m_rUser="root";
		private $m_rPass="";
		private $m_rDatabase="hospitality";
		public $conn;
		
		public function __construct(){
			$this->conn=@new mysqli($this->m_rHost,$this->m_rUser,$this->m_rPass,$this->m_rDatabase);

			if($this->conn->connect_errno){
				throw new Exception("My apologies my lord, I seem to have misplaced the database");
			}
		}
	}

?>