<?php
	include_once('Db.class.php');	

	class Activity {
		
		private $m_sTitle;
		private $m_sText;
		private $m_sDate;
		private $m_iUserId;
		private $m_iComments = 0;
		public $errors = [];
		
		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
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
				case 'Date':
					$this->m_sDate = $p_vValue;
					break;
				case 'UserId':
					$this->m_iUserId = $p_vValue;
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) {
				case 'Title':
					return $this->m_sTitle;
					break;
				case 'Text':
					return $this->m_sText;
					break;
				case 'Date':
					return $this->m_sDate;
					break;
				case 'UserId':
					return $this->m_iUserId;
					break;
			}
		}

		public function SaveActivity() {
			$db = new Db();
			$sql = "INSERT INTO activity_tbl (activity_title, activity_text, activity_date, activity_comments_number, fk_user_id) 
					VALUES (
							'" . $db->conn->real_escape_string($this->m_sTitle) . "',
					  		'" . $db->conn->real_escape_string($this->m_sText) . "',
					  		'" . $db->conn->real_escape_string($this->m_sDate) . "',
					  		'" . $db->conn->real_escape_string($this->m_iComments) . "',
					  		'" . $db->conn->real_escape_string($this->m_iUserId) . "'
							)";
			$db->conn->query($sql);
		}

		public function GetActivities($uid) {
			$db = new Db();
			$sql = "SELECT * FROM activity_tbl 
					WHERE fk_user_id = '$uid'
					ORDER BY activity_id DESC";
			$result = $db->conn->query($sql);
			return $result;
		}

		public function GetLatestActivity($uid) {
			$db = new Db();
			$sql = "SELECT * FROM activity_tbl WHERE fk_user_id = '$uid' 
					ORDER BY activity_id DESC LIMIT 1";
			$result = $db->conn->query($sql);
			$data = $result->fetch_assoc();
			return $data;
		}

	}

?>