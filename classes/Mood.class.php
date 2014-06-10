<?php
	include_once('Db.class.php');

	class Mood {
		
		private $m_iUserId;
		private $m_sGeneral;
		private $m_sFeeling;
		public $errors = [];

		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
				case 'UserId':
					$this->m_iUserId = $p_vValue;
					break;
				case 'General':
					if (!empty($p_vValue)) {
						$this->m_sGeneral = $p_vValue;
					} else {					
						$this->errors["errorGeneral"] = "Choose your general mood";
					}
					break;
				case 'Feeling':
					if(strpos(trim($p_vValue), ' ') !== false) {
						$this->errors["errorFeeling"] = "Try to describe your mood in one word";
					} else {
						$this->m_sFeeling = $p_vValue;
					}
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) {
				case 'UserId':
					return $this->m_iUserId;
					break;
				case 'General':
					return $this->m_sGeneral;
					break;
				case 'Feeling':
					return $this->m_sFeeling;
					break;
			}
		}

		public function UpdateMood() {
			$db = new Db();
			$existSql = "SELECT * FROM mood_tbl 
						WHERE fk_user_id = '$this->m_iUserId'";
			$insertSql = "INSERT INTO  mood_tbl (mood_general, mood_feeling, fk_user_id) 
						  VALUES (
						  		'" . $db->conn->real_escape_string($this->m_sGeneral) . "',
						  		'" . $db->conn->real_escape_string($this->m_sFeeling) . "',
						  		'" . $db->conn->real_escape_string($this->m_iUserId) . "'
						  		)";
			$updateSql = "UPDATE mood_tbl 
						 SET 
							mood_general ='" . $db->conn->real_escape_string($this->m_sGeneral) . "',
							mood_feeling ='" . $db->conn->real_escape_string($this->m_sFeeling) . "'
						 WHERE fk_user_id = '" . $db->conn->real_escape_string($this->m_iUserId) . "'";
			$result = $db->conn->query($existSql);
			if ($result->num_rows == 0) {
				$db->conn->query($insertSql);
				return false;
			} else {
				$db->conn->query($updateSql);
				return true;
			}
		}

		public function GetMood($uid) {
			$db = new Db();
			$sql = "SELECT * FROM mood_tbl WHERE fk_user_id = '$uid'";
			$result = $db->conn->query($sql);
			$data = $result->fetch_assoc();
			return $data;
		}
	}
	
?>