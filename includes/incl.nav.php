<?php

  $currentPage = $_SERVER['SCRIPT_NAME'];
  $url = explode("/", $currentPage);
  $page = end($url);

?>

<nav class="nav-wrap" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#drop-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="home.php"><img src="img/Hospitality_logo_web.png" alt="hospitality logo"></a>
    </div>

    <div class="collapse navbar-collapse" id="drop-nav">
      <ul class="navbar-right">
        <li><a <?php if($page == "home.php") echo "class='active'"; ?> href="home.php">Home</a></li>
        <li><a <?php if($page == "about.php") echo "class='active'"; ?> href="about.php">About Hospitality</a></li>
        <li><a <?php if($page == "contact.php") echo "class='active'"; ?> href="contact.php">Contact</a></li>
        <?php
        if($page != "home.php"): ?>
        <li><a class="single-link <?php if($page == "login.php") echo "active"; ?>" href="login.php">Login</a></li>
        <li class="hidden-xs hidden-sm space"><small>or</small></li>
        <li><a class="btn-menu" href="register.php" role="button">Register</a></li> 
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>