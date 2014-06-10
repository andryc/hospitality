<?php
	
	include_once('../classes/User.class.php');
	include_once('../classes/Mood.class.php');

	if (isset($_POST['name'])) {

		$name = $_POST['name'];

		$u = new User();
		$response = $u->SearchUser($name);

		header('Content-Type: application/json');
		echo json_encode($response);
	}
?>