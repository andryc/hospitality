<?php
	session_start();
	include_once('classes/User.class.php');
	$uid = $_SESSION['id'];
	$u = new User();
	$user = $u->GetUserInfo($uid);

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visits | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-funct.php'); ?>
<div class="container">
	<div class="content-wrap">
		<h2>Your visits</h2>
		<div class="row">
			<div class="col-md-6">
				<h3>Personal details</h3>
			</div>
			<div class="col-md-6">
				<h3>Visits</h3>
			</div>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>