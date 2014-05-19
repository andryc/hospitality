<?php
	include_once('Db.class.php');	

	class Activity {
		
		private $m_iUserId;
		private $m_sTitle;
		private $m_sText;
		private $m_iComments = 0;
		public $errors = [];
		
		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
				case 'UserId':
					$this->m_iUserId = $p_vValue;
					break;
				case 'Title':
					if (!empty($p_vValue)) {
						$this->m_sTitle = $p_vValue;
					} else {					
						$this->errors["errorTitle"] = "Fill in a title";
					}
					break;
				case 'Text':
					if (!empty($p_vValue)) {
						$this->m_sText = $p_vValue;
					} else {
						$this->errors["errorText"] = "Fill in an activity";
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

		public function SaveActivity() {
			$db = new Db();
			$sql = "INSERT INTO activity_tbl (activity_title, activity_text, activity_comments_number, fk_user_id) 
					VALUES (
							'" . $db->conn->real_escape_string($this->m_sTitle) . "',
					  		'" . $db->conn->real_escape_string($this->m_sText) . "',
					  		'" . $db->conn->real_escape_string($this->m_iComments) . "',
					  		'" . $db->conn->real_escape_string($this->m_iUserId) . "'
							)";
			$db->conn->query($sql);
		}
	}

	public function GetActivities() {
		
	}

?>