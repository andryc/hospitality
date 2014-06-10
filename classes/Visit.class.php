<?php
	include_once('Db.class.php');

	class Visit {
		
		private $m_sFirstName;
		private $m_sLastName;
		private $m_sDate;
		private $m_sStatus;

		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
				case 'FirstName':
					$this->m_sFirstName = $p_vValue;
					break;
				case 'LastName':
					$this->m_sLastName = $p_vValue;
					break;
				case 'Date':
					$this->m_sDate = $p_vValue;
					break;
				case 'Status':
					$this->m_sStatus = $p_vValue;
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) {
				case 'FirstName':
					return $this->m_sFirstName;
					break;
				case 'LastName':
					return $this->m_sLastName;
					break;
				case 'Date':
					return $this->m_sDate;
					break;
				case 'Status':
					return $this->m_sStatus;
					break;
			}
		}

		public function CheckIn($uid) {
			$db = new Db();
			$sql = "INSERT INTO visit_tbl (visit_firstname, visit_lastname, visit_date, visit_status, fk_userpatient_id) 
					VALUES (
							'" . $db->conn->real_escape_string($this->m_sFirstName) . "', 
							'" . $db->conn->real_escape_string($this->m_sLastName) . "', 
							'" . $db->conn->real_escape_string($this->m_sDate) . "',
							'" . $db->conn->real_escape_string($this->m_sStatus) . "',
							'" . $db->conn->real_escape_string($uid) . "'
							)";
			echo $sql;
			$db->conn->query($sql);
		}

		public function GetPending($uid) {
			$db = new Db();
			$sql = "SELECT * FROM visit_tbl 
					WHERE fk_userpatient_id = '$uid'
					AND visit_status = 'pending'";
			$result = $db->conn->query($sql);
			return $result;
		}
		
		public function ChangeStatus() {
			$db = new Db();
			$sql = "SELECT * FROM visit_tbl 
					WHERE fk_userpatient_id = '$uid'
					AND visit_status = 'pending'";
			$result = $db->conn->query($sql);
		}
	}

?>