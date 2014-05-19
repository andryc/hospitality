<?php
	
	if(isset($u->error)){
		if(isset($u->error['errorName'])) {
			$err_name = $u->error['errorName'];
		}
		if(isset($u->error['errorSurname'])) {
			$err_surname = $u->error['errorSurname'];					
		}
		if(isset($u->error['errorCondition'])) {
			$err_condition = $u->error['errorCondition'];
		}
		if(isset($u->error['errorDescription'])) {
			$err_lastname = $u->error['errorDescription'];
		}
		if(isset($u->error['errorEmail'])) {
			$err_email = $u->error['errorEmail'];
		}
		if(isset($u->error['errorEmailCheck'])) {
			$err_emailCheck = $u->error['errorEmailCheck'];
		}
		if(isset($u->error['errorPass'])) {
			$err_pass = $u->error['errorPass'];
		}
		if(isset($u->error['errorPassCheck'])) {
			$err_passCheck = $u->error['errorPassCheck'];
		}
	}

?>