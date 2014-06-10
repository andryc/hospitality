<?php
	session_start();
	if ($_SESSION['patient'] == "true") {
		include_once('classes/User.class.php');
		include_once('classes/Visit.class.php');
		$uid = $_SESSION['id'];
		$u = new User();
		$v = new Visit();

		$user = $u->GetUserInfo($uid);
		$pending = $v->GetPending($uid);
		
		if (isset($_POST['accept-btn'])) {
			
		} elseif (isset($_POST['denie-btn'])) {
			
		}
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
					Name: <?php echo $user['user_firstname'] ." ". $user['user_lastname']; ?>
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
		<div class="row">
			<div class="col-md-12">
				<h3>Checked in</h3>
				<?php if ($pending->num_rows > 0) { 
					foreach ($pending as $p) { ?>
						<span><?php echo $p['visit_firstname'] . " " . $p['visit_lastname']; ?></span>
						<form role="form" method="post">
							<input type="hidden" value="<?php echo $p['visit_id'] ?>">
							<input type="submit" name="accept-btn" class="btn-hosp-lil" value="Accept">
							<input type="submit" name="denie-btn" class="btn-hosp-lil" value="Denie">
						</form>
					<?php } ?>

				<?php } else { ?>
					<p>No one has checked in</p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>