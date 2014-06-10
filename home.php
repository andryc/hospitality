<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hospitality</title>
  <?php include_once('includes/incl.head.php'); ?>
</head>
<body>
<?php include_once('includes/incl.nav.php'); ?>
  <div id="cta">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <section id="cta-left">
            <p>
              <span>Welcome to Hospitality</span> Being commited for a longer period of time? Don't want to lose touch with your friends and family?
              <br>
              Try out <strong>hospitality</strong>.
            </p>
          </section>
        </div>

        <div class="col-md-6">
          <section id="cta-right"> 
            <p>
              Are you interested in what <strong>Hospitality</strong> has to offer you? Don't hesitate an join today!
              <br>
            </p>
              <a href="login.php" class="btn-cta" role="button">Login</a>
                or
              <a href="register.php" class="btn-cta" role="button">Register</a>
          </section>
        </div>
      </div>
    </div>
  </div>
 
  <div class="container">
    <div class="row">
      <div id="functions">
        <div class="col-md-4">
          <section class="funct-wrap">
            <div class="funct-ico pull-left">
              <img class="funct-img" src="img/activity-icon.png" alt="activity icon">
            </div>
            <div class="funct-text">
              <h3>Activities</h3>
              <p>
                Be active. Write to your visitors what you are experiencing during your stay. Share your story so others can learn from it.
              </p>
            </div>
          </section>
        </div>
        <div class="col-md-4">
          <section class="funct-wrap">
            <div class="funct-ico pull-left">
              <img class="funct-img" src="img/mood-icon.png" alt="mood icon">
            </div>
            <div class="funct-text">
              <h3>Status</h3>
              <p>
                Having a bad day? Let your friends and family know. They can't help you if they don't know. Don't stop there,  
              </p>
            </div>
          </section>
        </div>
        <div class="col-md-4">
          <section class="funct-wrap">
            <div class="funct-ico pull-left">
              <img class="funct-img" src="img/visitor-icon.png" alt="visitor icon">
            </div>
            <div class="funct-text">
              <h3>Visitors</h3>
              <p>
                Let people who haven't visited you yet see who has.  
              </p>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
<?php include_once('includes/incl.footer.php'); ?>
</body>
</html>