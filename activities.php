<?php
	session_start();
	include_once('classes/Activity.class.php');
	$uid = $_SESSION['id'];

	if (isset($_POST['activ-btn'])) {
		$a = new Activity();
		$a->Title = $_POST['title'];
		$a->Text = $_POST['text'];
		$a->UserId = $uid;
		$a->SaveActivity();
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Activities | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-funct.php'); ?>
<div class="container">
	<h2>Activities</h2>
	<form role="form" method="post">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="text">What did you do?</label>
			<textarea class="form-control" id="text" name="text" rows="5"></textarea>
		</div>
		<input type="submit" class="btn btn-default" name="activ-btn" value="Save activity">
	</form>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>