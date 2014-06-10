<?php
	session_start();
	include_once('classes/User.class.php');
	if (isset($_POST['search-btn'])) {

		$name = $_POST['name'];

		$u = new User();
		$names = $u->SearchUser($name);
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visitor | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-vis.php'); ?>
<div class="container">
	<div class="content-wrap">
		<h2>Visits</h2>
		<div class="form-wrap">
			<form class="form-inline" role="form" method="post">
		        <div class="form-group">
		          	<input type="text" class="form-control" id="search" name="name" placeholder="Search">
		        </div>
		        <input type="submit" class="btn btn-default" name="search-btn" value="Search">
		    </form>
	    </div>
	    <ul id="namelist" class="list-group">
	    <?php  if(isset($_POST['search-btn']))foreach ($names as $name) { ?>
	    	<li class="list-group-item"><a href=""><?php echo $name['user_name'] ?></a></li>
	   	<?php } ?>
	   	</ul>
	   	<p id="feedback"></p>
    </div>
</div>
<?php include_once('includes/incl.footer.php'); ?>
<script>
function getUsers(name){

	$.ajax({
		  type: "POST",
		  url: "ajax/search.php",
		  data: {name : name}
	})

	.done(function( msg ) {
		if (msg == false) {
			$('#feedback').html('Search for a patient');
		} else {
			var show = '';

			for(var i = 0; i < msg.length ; i++) {
				show += '<li class="list-group-item"><a href="patient.php?patient_id=' + msg[i][0] + '"</a>'+ msg[i][1] + ' ' + msg[i][2] +'</li>';
			}

			$('#namelist').html(show);
		}
		
	});

};

getUsers('');

$('#search').on('keyup', function(e){
	//console.log('keyup');
	var n = $(this).val();

	getUsers(n);

	e.preventDefault();
});
</script>
</body>
</html>