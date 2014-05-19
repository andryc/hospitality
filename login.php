<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav.php'); ?>
<div class="container">
	<form role="form" method="post">
  		<div class="form-group">
    		<label for="email">Email</label>
    		<input type="email" class="form-control" id="email" placeholder="you@hospitality.com">
  		</div>
  		<div class="form-group">
    		<label for="pass">Password</label>
    		<input type="password" class="form-control" id="pass" placeholder="Password">
  		</div>
  		<input type="submit" class="btn btn-default" name="login-btn" value="Login" />
	</form>
	<a href="register.php">Not a member yet?</a>
</div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>