<?php
	session_start();
	if ($_SESSION['patient'] == "true") {
		include_once('classes/Mood.class.php');
		$u_name = $_SESSION['firstname'];
		$uid = $_SESSION['id'];
		$m = new Mood();
		if (isset($_POST['mood-btn'])) {
			$m->UserId = $uid;
			$m->General = $_POST['general'];
			$m->Feeling = $_POST['feeling'];
			$m->UpdateMood();
		}
	} else {
		header('Location: visitor.php');
	}
	
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mood | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-pat.php'); ?>
<div class="container">
	<div class="content-wrap">
		<h2>Mood</h2>
	<?php
		$row = $m->GetMood($uid);
		$mood = $row->fetch_assoc();
		if ($row->num_rows > 0) { ?>
			<p>Welcome <a href="visits.php" class="highlight"><?php echo $u_name; ?></a>, You are feeling <span class="highlight"><?php echo $mood['mood_feeling'] ?></span></p>
	<?php } else { ?>
			<p>Welcome <a href="visits.php"><?php echo $u_name; ?></a>, how are you feeling today?</p>
	<?php } ?>
		<h3>Update your mood</h3>
		<div class="form-wrap">
			<form role="form" method="post">
				<div class="form-group">
					<label for="general">In general</label>
					<select class="form-control" name="general" id="general">
						<option value="good">Good</option>
						<option value="normal">Normal</option>
						<option value="bad">Bad</option>
					</select>
				</div>
				<div class="form-group">
					<label for="feeling">In your own words</label>
					<input type="text" class="form-control" id="feeling" name="feeling">
				</div>
				<input type="submit" class="btn-hosp" name="mood-btn" value="Mood">
			</form>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>	
</body>
</html>