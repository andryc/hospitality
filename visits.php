<?php
	session_start();
	if ($_SESSION['patient'] == "true") {
		include_once('classes/User.class.php');
		$uid = $_SESSION['id'];
		$u = new User();
		$user = $u->GetUserInfo($uid);
	} else {
		header('Location: visitor.php');
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visits | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-pat.php'); ?>
<div class="container">
	<div class="content-wrap">
		<h2>Visits</h2>
		<div class="row">
			<div class="col-md-6">
				<h3>Personal details</h3>
				<p>
					Name: <?php echo $user['user_name'] ." ". $user['user_surname']; ?>
					<br>
					Condition: <?php echo $user['user_condition']; ?>
					<br>
					Description: <?php echo $user['user_description']; ?>
				</p>
			</div>
			<div class="col-md-6">
				<h3>Visited this week</h3>
				
			</div>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>