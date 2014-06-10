<?php
	include_once('Db.class.php');

	class Contact {

		private $m_sName;
		private $m_sEmail;
		private $m_sQuestion;
		public $errors = [];

		public function __SET($p_sProperty, $p_vValue) {
			switch($p_sProperty) {
				case 'Name':
					if(!empty($p_vValue)) {
						$this->m_sName = $p_vValue;
					} else {
						$this->errors["errorName"] = "Fill in your name";
					}
					break;
				case 'Email':
					if(!empty($p_vValue)) {
						$this->m_sEmail = $p_vValue;
					} else {
						$this->errors["errorEmail"] = "Fill in your email";
					}	
					break;
				case 'Question':
					if(!empty($p_vValue)) {
						$this->m_sQuestion = $p_vValue;
					} else {
						$this->errors["errorQuestion"] = "Fill in your question";
					}	
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch($p_sProperty) {
				case 'Name':
					return $this->m_sName;
					break;
				case 'Email':
					return $this->m_sEmail;
					break;
				case 'Question':
					return $this->m_sQuestion;
					break;
			}
		}

		public function SaveContact() {
			$db = new Db();
			$sql = "INSERT INTO contact_tbl (contact_name, contact_email, contact_question) 
					VALUES (
							'" . $db->conn->real_escape_string($this->m_sName) . "',
							'" . $db->conn->real_escape_string($this->m_sEmail) . "',
							'" . $db->conn->real_escape_string($this->m_sQuestion) . "'
							)";
			$db->conn->query($sql);
		}
	}

?>