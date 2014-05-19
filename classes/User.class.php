<?php
	include_once('Db.class.php');
	
	class User {
		private $m_sName;
		private $m_sSurname;
		private $m_sCondition;
		private $m_sDescription;
		private $m_sEmail;
		private $m_sPass;
		private $m_sPassCheck;
		private $m_bPatient;
		public $errors = [];

		public function __SET($p_sProperty, $p_vValue) {
			switch($p_sProperty) {
				case "Name":
				if(!empty($p_vValue)) {
					$this->m_sName = $p_vValue;
				} else {
					$this->errors["errorName"] = "Fill in your name";
				}
				break;
				
				case "Surname":
				if(!empty($p_vValue)) {
					$this->m_sSurname = $p_vValue;
				} else {
					$this->errors["errorSurname"] = "Fill in your surname";
				}
				break;
				
				case "Condition":
				if(!empty($p_vValue)) {
					$this->m_sCondition = $p_vValue;
				} else {
					$this->errors["errorCondition"] = "Fill in your type of condition";
				}
				break;
				
				case "Description":
				if(!empty($p_vValue)) {
					$this->m_sDescription = $p_vValue;
				} else {
					$this->errors["errorDescription"] = "Fill in a description";
				}
				break;
				
				case "Email":
				if(!empty($p_vValue)) {
					$this->m_sEmail = $p_vValue;
				} else {
					$this->errors["errorEmail"] = "Fill in your email";
				}
				break;
				
				case "Pass":
				$salt = "req7h!qf35Hospitality3sd4g!s7";
				if(strlen($p_vValue) < 6) {
					$this->errors["errorPass"] = "Password must be at least 5 characters long";
				} else {
		 			$this->m_sPass = md5($p_vValue . $salt);
				}
				break;

				case "PassCheck":
				$salt = "req7h!qf35Hospitality3sd4g!s7";
				if ($this->m_sPass == md5($p_vValue . $salt)) {
					$this->m_sPassCheck = $p_vValue;
				} else {
					$this->errors["errorPassCheck"] = "Password doesn't match";
				}
				break;

				case "CheckPatient":
				$this->m_bPatient = $p_vValue;
				break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) {
				case 'Name':
					return $this->m_sName;
					break;
				case 'Surname':
					return $this->m_sSurname;
					break;
				case 'Condition':
					return $this->m_sCondition;
					break;
				case 'Description':
					return $this->m_sDescription;
					break;
				case 'Email':
					return $this->m_sEmail;
					break;
				case 'Password':
					return $this->m_sPass;
					break;
				case 'PassCheck':
					return $this->m_sPassCheck;
					break;
				case 'CheckPatient':
					return $this->m_bPatient;
					break;
			}
		}

		public function EmailAvailable($db) {
			$sql = "select * from user_tbl 
					where user_email = '" . $db->conn->real_escape_string($this->m_sEmail) . "'";
			$result = $db->conn->query($sql);
			if($result->num_rows == 0) {
				$available = true;
			} else {
				$available = false;	
			}
			return $available;
		}

		public function Register() {
			$db = new Db();
			$emailCheck = $this->EmailAvailable($db);
			if($emailCheck) {
				$sql = "insert into user_tbl(
							user_name, user_surname, user_condition, user_description, user_email, user_password, user_patient) 
						VALUES(
							'" . $db->conn->real_escape_string($this->m_sName) . "', 
							'" . $db->conn->real_escape_string($this->m_sSurname) . "', 
							'" . $db->conn->real_escape_string($this->m_sCondition) . "',
							'" . $db->conn->real_escape_string($this->m_sDescription) . "',
							'" . $db->conn->real_escape_string($this->m_sEmail) . "',
							'" . $db->conn->real_escape_string($this->m_sPass) . "',
							'" . $db->conn->real_escape_string($this->m_bPatient) . "'
							)
						";
				$db->conn->query($sql);
			} else {
				$this->errors['errorEmailCheck'] = "Sorry this e-mail adress already has an account.";
			}
		}

		public function Login() {
			$db = new Db();
			$sql = "select * from user_tbl 
					where user_email ='".$db->conn->real_escape_string($this->m_sEmail)."' 
					and
					user_password='".$db->conn->real_escape_string($this->m_sPass)."'";

			$sqlPatient = 	"select * from user_tbl
							where user_email ='".$db->conn->real_escape_string($this->m_sEmail)."' 
							and
							user_patient ='true'";

			$checkPatient = $db->conn->query($sqlPatient);

			$result = $db->conn->query($sql);

			if($result->num_rows == 1) {
				if ($checkPatient->num_rows == 1) {
					$patient = true;
					return $patient;
				} else {
					$patient = false;
					return $patient;
				}

			} else {
				$this->errors['errorLogin'] = "Sorry, your email or password is incorrect";
			}
		}

		public function getId() {
			$db = new Db();
			$sql = "SELECT user_id FROM user_tbl
					WHERE user_email = '" . $db->conn->real_escape_string($this->m_sEmail) . "'";
			
			$result = $db->conn->query($sql);
			$row = $result->fetch_assoc();
			$id = $row['user_id'];
			return $id;
		}

		public function getUserInfo($id) {
			$db = new Db();
			$sql = "SELECT * FROM user_tbl
					WHERE user_id = '" . $db->conn->real_escape_string($id) . "'";
			
			$result = $db->conn->query($sql);
			$row = $result->fetch_assoc();
			return $row;
		}
	}

?>