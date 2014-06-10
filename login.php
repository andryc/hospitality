<?php
	include_once('classes/User.class.php');

	if (isset($_POST['login-btn'])) {
		$u = new User();
		$u->Email = $_POST['email'];
		$u->Pass = $_POST['pass'];
		if (isset($u->errors) && !empty($u->errors)) {
			if(isset($u->errors['errorLogin'])) {
				$err_login = $u->errors['errorLogin'];
			}
		} else {
			$u->login();
			$uid = $u->getId();
			$userInfo = $u->getUserInfo($uid);

			session_start();
			$_SESSION['email'] = $u->Email;
			$_SESSION['id'] = $uid;
			$_SESSION['name'] = $userInfo['user_name'];
			$_SESSION['surname'] = $userInfo['user_surname'];
			
			if ($u->Login() == true) {
				$_SESSION['patient'] = "true";
				header('Location: mood.php');
			} elseif ($u->Login() == false) {
				$_SESSION['patient'] = "false";
				header('Location: visitor.php');
			}
		}
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav.php'); ?>
<div class="container">
	<div class="content-wrap">
		<div class="form-wrap center-block">
			<h2>Login</h2>
			<form role="form" method="post">
				<?php if(isset($err_login)) echo "<p class='bg-danger'>$err_login</p>"; ?>
		  		<div class="form-group">
		    		<label for="email">Email</label>
		    		<input type="email" class="form-control" id="email" name="email" placeholder="you@hospitality.com">
		  		</div>
		  		<div class="form-group">
		    		<label for="pass">Password</label>
		    		<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
		  		</div>
		  		<input type="submit" class="btn-hosp" name="login-btn" value="Login" />
			</form>
			<a class="under" href="register.php">Not a member yet?</a>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>