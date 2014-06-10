<?php
	include_once('classes/Contact.class.php');

	if (isset($_POST['contact-btn'])) {
		$c = new Contact();
		$c->Name = $_POST['name'];
		$c->Email = $_POST['email'];
		$c->Question = $_POST['question'];

		if (isset($c->errors) && !empty($c->errors)) {
			if(isset($c->errors['errorName'])) {
				$err_name = $c->errors['errorName'];
			}
			if(isset($c->errors['errorEmail'])) {
				$err_email = $c->errors['errorEmail'];					
			}
			if(isset($c->errors['errorQuestion'])) {
				$err_question = $c->errors['errorQuestion'];
			}
		} else {
			$c->SaveContact();
			$feedback = "Thanks for your question";
		}

	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact | Hospitality</title>
	<?php include_once('includes/incl.head.php') ?> 
</head>
<body>
<?php include_once('includes/incl.nav.php') ?>
<div class="container">
	<div class="content-wrap">
		<div class="form-wrap center-block">
			<h2>Got a question?</h2>
			<form role="form" method="post">
				<?php if(isset($feedback)) echo "<p class='bg-success'>$feedback</p>"; ?>
				<div class="form-group">
					<label for="name">Name</label>
					<?php if(isset($err_name)) echo "<p class='bg-danger'>$err_name</p>"; ?>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<?php if(isset($err_email)) echo "<p class='bg-danger'>$err_email</p>"; ?>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="question">Question</label>
					<?php if(isset($err_question)) echo "<p class='bg-danger'>$err_question</p>"; ?>
					<textarea class="form-control" name="question" id="question" rows="5"></textarea>
				</div>
				<input type="submit" class="btn-hosp" name="contact-btn" value="Ask away">
			</form>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php') ?>
</body>
</html>