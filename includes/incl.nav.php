<?php

  $currentPage = $_SERVER['SCRIPT_NAME'];
  $url = explode("/", $currentPage);
  $page = end($url);

?>

<nav class="navbar nav-wrap" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#drop-nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#"><img src="img/Hospitality_logo_web.png" alt="hospitality logo"></a>
    </div>

    <div class="collapse navbar-collapse" id="drop-nav">
      <ul class="navbar-right">
        <li><a <?php if($page == "home.php") echo "class='active'"; ?> href="home.php">Home</a></li>
        <li><a <?php if($page == "about.php") echo "class='active'"; ?> href="about.php">About Hospitality</a></li>
        <li><a <?php if($page == "contact.php") echo "class='active'"; ?> href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>