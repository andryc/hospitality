<?php
	include_once('classes/User.class.php');
	

	if (isset($_POST['register-btn'])) {
		$u = new User();
		$u->Name = $_POST['name'];
		$u->Surname = $_POST['surname'];
		$u->Condition = $_POST['condition'];
		$u->Description = $_POST['description'];
		$u->Email = $_POST['email'];
		$u->Pass = $_POST['pass'];
		$u->PassCheck = $_POST['pass-check'];
		$u->CheckPatient = $_POST['radio'];

		include_once('includes/incl.errors.php');
		
		$u->Register();

		session_start();
		header('Location: activity.php');
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav.php'); ?>
<div class="container">

	<form id="register-form" role="form" method="post">
  		<div class="form-group">
  			<p class="bg-danger"><?php if(isset($err_name)) echo $err_name; ?></p>
    		<label for="name">Name</label>
    		<input type="text" class="form-control" id="name" name="name" placeholder="Name">
  		</div>
  		<div class="form-group">
  			<p class="bg-danger"><?php if(isset($err_surname)) echo $err_surname; ?></p>
    		<label for="surname">Surname</label>
    		<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
  		</div>
  		<div class="form-group">
  			<label for="">Are you visiting or staying?</label>
	  		<div class="radio">
	  			<label>
	    			<input type="radio" name="radio" id="visitor" value="true" checked />
	    			Patient
	  			</label>
			</div>
			<div class="radio">
			  	<label>
				    <input type="radio" name="radio" id="patient" value="false" />
				    Visitor
			  	</label>
			</div>
		</div>
  		<div class="form-group" id="cond-group">
  			<p class="bg-danger"><?php if(isset($err_condition)) echo $err_condition; ?></p>
    		<label for="condition">Condition</label>
    		<input type="text" class="form-control" id="email" name="condition" placeholder="Condition">
  		</div>
  		<div class="form-group" id="descr-group">
  			<p class="bg-danger"><?php if(isset($err_description)) echo $err_description; ?></p>
    		<label for="description">Description</label>
    		<textarea class="form-control" rows="3" id="description" name="description"></textarea>
  		</div>
  		<div class="form-group">
  			<p class="bg-danger"><?php if(isset($err_email)){echo $err_email;}elseif(isset($err_emailCheck)){echo $err_emailCheck;} ?></p>
    		<label for="email">Email</label>
    		<input type="email" class="form-control" id="email" name="email" placeholder="you@hospitality.com">
  		</div>
  		<div class="form-group">
    		<label for="pass">Password</label>
    		<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
  		</div>
  		<div class="form-group">
    		<label for="pass-check">Confirm password</label>
    		<input type="password" class="form-control" id="pass-check" name="pass-check" placeholder="Password">
  		</div>
  		<input type="submit" class="btn btn-default" name="register-btn" value="Register" />
	</form>
	<a href="login.php">Already a member?</a>
</div>
<?php include_once('includes/incl.footer.php'); ?>

<script>
$(document).ready(function(){

	$("#cond-group").css({"display": "block"});
	$("#descr-group").css({"display": "block"});

	$("#patient").on("click", function(){
		$("#cond-group").css({"display": "none"});
		$("#descr-group").css({"display": "none"});
	});

	$("#visitor").on("click", function(){
		$("#cond-group").css({"display": "block"});
		$("#descr-group").css({"display": "block"});
	});

});
</script>
</body>
</html>