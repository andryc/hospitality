<?php
	
	include_once('Db.class.php');

	class Comment {
		
		private $m_sCommenter;
		private $m_sDate;
		private $m_sComment;
		private $m_iActivityId;

		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {
				case 'Commenter':
					$this->m_sCommenter = $p_vValue;
					break;
				case 'Date':
					$this->m_sDate = $p_vValue;
					break;
				case 'Comment':
					$this->m_sComment = $p_vValue;
					break;
				case 'ActivityId':
					$this->m_iActivityId = $p_vValue;
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) {
				case 'Commenter':
					return $this->m_sCommenter;
					break;
				case 'Date':
					return $this->m_sDate;
					break;
				case 'Comment':
					return $this->m_sComment;
					break;
				case 'ActivityId':
					return $this->m_iActivityId;
					break;
			}
		}

		public function UpdateCommentNumber($aid) {
			$db = new Db();
			$sql = "UPDATE activity_tbl 
					SET activity_comments_number = activity_comments_number + 1
					WHERE activity_id = '$aid'";
			$db->conn->query($sql);
		}

		public function SaveComment() {
			$db = new Db();
			$sql = "INSERT INTO comment_tbl (comment_creator, comment_date, comment_message, fk_activity_id) 
					VALUES (
							'" . $db->conn->real_escape_string($this->m_sCommenter) . "',
					  		'" . $db->conn->real_escape_string($this->m_sDate) . "',
					  		'" . $db->conn->real_escape_string($this->m_sComment) . "',
					  		'" . $db->conn->real_escape_string($this->m_iActivityId) . "'
							)";
			$db->conn->query($sql);
		}

		public function GetComments($aid) {
			$db = new Db();
			$sql = "SELECT * FROM comment_tbl 
					WHERE fk_activity_id = '$aid'
					ORDER BY comment_id";
			$result = $db->conn->query($sql);
			return $result; 
		}
	}

?>