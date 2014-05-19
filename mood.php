<?php
	session_start();
	include_once('classes/Mood.class.php');
	$u_name = $_SESSION['name'];
	$uid = $_SESSION['id'];

	if (isset($_POST['mood-btn'])) {
		$m = new Mood();
		$m->UserId = $uid;
		$m->General = $_POST['general'];
		$m->Feeling = $_POST['feeling'];
		$m->UpdateMood();
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mood | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-funct.php'); ?>
<div class="container">
	<h2>Mood</h2>
	<p>Welcome <span class="highlight"><?php echo $u_name; ?></span>, how are you feeling today?</p>
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
		<input type="submit" class="btn btn-default" name="mood-btn" value="Mood">
	</form>
</div>
<?php include_once('includes/incl.footer.php'); ?>	
</body>
</html>