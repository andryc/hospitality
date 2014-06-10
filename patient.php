<?php
	session_start();
	include_once('classes/User.class.php');
	include_once('classes/Mood.class.php');
	include_once('classes/Activity.class.php');
	include_once('classes/Comment.class.php');
	include_once('classes/Visit.class.php');

	if (isset($_GET['patient_id'])) {
		$uid = $_GET['patient_id'];
		$u = new User();
		$m = new Mood();
		$a = new Activity();
		$c = new Comment();
		$v = new Visit();

		$user = $u->GetUserInfo($uid);
		$data = $m->GetMood($uid);
		$mood = $data->fetch_assoc();
		$activity = $a->GetLatestActivity($uid);
		$aid = $activity['activity_id'];
		$date = date('F j, Y, G:i');
		
		if (isset($_POST['comment-btn'])) {
			$c->Commenter = $_SESSION['name'];
			$c->Date = $date;
			$c->Comment = $_POST['comment'];
			$c->ActivityId = $aid;
			$c->SaveComment();
			$c->UpdateCommentNumber($aid);
		}	
		$comments = $c->GetComments($aid);

		if (isset($_POST['visit-btn'])) {
			$v->FirstName = $_SESSION['firstname'];
			$v->LastName = $_SESSION['lastname'];
			$v->Date = $date;
			$v->Status = "pending";
			$v->CheckIn($uid);
		}
		
	}

?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $user['user_firstname'] ." ". $user['user_lastname']; ?> | Hospitality</title>
	<?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav-vis.php'); ?>
<div class="container">
	<div class="content-wrap">
		<div class="row">
			<div class="col-md-6">
				<h3><?php echo $user['user_firstname'] ." ". $user['user_lastname']; ?></h3>
				<p>
					<br>
					Condition: <?php echo $user['user_condition']; ?>
					<br>
					Description: <?php echo $user['user_description']; ?>
					<br>
					Mood: <?php echo $mood['mood_feeling']; ?>
				</p>
				<br>
				<h3>Latest activity</h3>
				<br>
				<article>
					<h4><?php echo $activity['activity_title']; ?></h4>
					<p><?php echo $activity['activity_text']; ?></p>
				</article>
				<h4>Conversation <span class="badge"><?php echo $activity['activity_comments_number']; ?></span></h4>
				<?php if ($comments->num_rows > 0) {
					while ($comment = $comments->fetch_assoc()) { ?>
						<article class="comment">
							<h5><?php echo $comment['comment_creator']; ?> <small><?php echo $comment['comment_date']; ?></small></h5>
							<p><?php echo $comment['comment_message'] ?></p>
						</article>
					<?php } ?>
				<?php } else { ?>
					<p>Join the conversation</p>
				<?php } ?>
				
				<h4>Comment</h4>
				<form role="form" method="post">
					<div class="form-wrap">
						<div class="form-group">
							<textarea name="comment" class="form-control" rows="5" placeholder="message"></textarea>
						</div>
						<input type="submit" class="btn-hosp" name="comment-btn" value="Comment">
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<form role="form" method="post">
					<div class="form-wrap">
						<input type="submit" class="btn-hosp-lil" name="visit-btn" value="Visit">
					</div>
				</form>
				<h3>Visited this week</h3>
				
			</div>
		</div>
	</div>
</div>
<?php include_once('includes/incl.footer.php'); ?>	
</body>
</html>