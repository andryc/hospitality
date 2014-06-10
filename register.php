<?php
	include_once('classes/User.class.php');
	

	if (isset($_POST['register-btn'])) {
		$u = new User();
		$u->FirstName = $_POST['firstname'];
		$u->LastName = $_POST['lastname'];
		$u->CheckPatient = $_POST['radio'];
		$u->Condition = $_POST['condition'];
		$u->Description = $_POST['description'];
		$u->Email = $_POST['email'];
		$u->Pass = $_POST['pass'];
		$u->PassCheck = $_POST['pass-check'];

		if(isset($u->errors) && !empty($u->errors)){
			if(isset($u->errors['errorFirstName'])) {
				$err_firstname = $u->errors['errorFirstName'];
			}
			if(isset($u->errors['errorLastName'])) {
				$err_lastname = $u->errors['errorLastName'];					
			}
			if(isset($u->errors['errorCondition'])) {
				$err_condition = $u->errors['errorCondition'];
			}
			if(isset($u->errors['errorDescription'])) {
				$err_description = $u->errors['errorDescription'];
			}
			if(isset($u->errors['errorEmail'])) {
				$err_email = $u->errors['errorEmail'];
			}
			if(isset($u->errors['errorEmailCheck'])) {
				$err_emailCheck = $u->errors['errorEmailCheck'];
			}
			if(isset($u->errors['errorPass'])) {
				$err_pass = $u->errors['errorPass'];
			}
			if(isset($u->errors['errorPassCheck'])) {
				$err_passCheck = $u->errors['errorPassCheck'];
			}
		} else {
			$u->Register();
			$uid = $u->getId();
			session_start();

			$_SESSION['email'] = $u->Email;
			$_SESSION['name'] = $u->FirstName;
			$_SESSION['surname'] = $u->LastName;
			$_SESSION['patient'] = $u->CheckPatient;
			$_SESSION['id'] = $uid;
			if ($_SESSION['patient'] == "true") {
				header('Location: mood.php');
			} elseif ($_SESSION['patient'] == "false") {
				header('Location: visitor.php');
			}
			
		}
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
	<div class="content-wrap">
		<div class="form-wrap center-block">
			<h2>Register</h2>
			<form id="register-form" role="form" method="post">
		  		<div class="form-group">
		    		<label for="firstname">First name</label>
		    		<?php if(isset($err_firstname)) echo "<p class='bg-danger'>$err_firstname</p>"; ?>
		    		<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
		  		</div>
		  		<div class="form-group">
		    		<label for="lastname">Last name</label>
		  			<?php if(isset($err_lastname)) echo "<p class='bg-danger'>$err_lastname</p>"; ?>
		    		<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
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
		    		<label for="condition">Condition</label>
		    		<?php if(isset($err_condition)) echo "<p class='bg-danger'>$err_condition</p>" ?>
		    		<input type="text" class="form-control" id="email" name="condition" placeholder="Condition" value="<?php if(isset($_POST['condition'])) echo $_POST['condition']; ?>">
		  		</div>
		  		<div class="form-group" id="descr-group">
		    		<label for="description">Description</label>
		    		<?php if(isset($err_description)) echo "<p class='bg-danger'>$err_description</p>" ?>
		    		<textarea class="form-control" rows="3" id="description" name="description"><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
		  		</div>
		  		<div class="form-group">
		  			
		    		<label for="email">Email</label>
		    		<?php if(isset($err_email)){echo "<p class='bg-danger'>$err_email</p>";}elseif(isset($err_emailCheck)){echo "<p class='bg-danger'>$err_emailCheck</p>";} ?>
		    		<input type="email" class="form-control" id="email" name="email" placeholder="you@hospitality.com" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
		  		</div>
		  		<div class="form-group">
		    		<label for="pass">Password</label>
		    		<?php if(isset($err_pass)) echo "<p class='bg-danger'>$err_pass</p>"; ?>
		    		<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
		  		</div>
		  		<div class="form-group">
		    		<label for="pass-check">Confirm password</label>
		    		<?php if(isset($err_passCheck)) echo "<p class='bg-danger'>$err_passCheck</p>"; ?>
		    		<input type="password" class="form-control" id="pass-check" name="pass-check" placeholder="Password">
		  		</div>
		  		<input type="submit" class="btn-hosp" name="register-btn" value="Register" />
			</form>
			<a class="under" href="login.php">Already a member?</a>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>

<script>
$(document).ready(function() {

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