<?php

	$currentPage = $_SERVER['SCRIPT_NAME'];
	$url = explode("/", $currentPage);
	$page = end($url);
	//$url2 = explode("m_", $page);
	//$groupname = explode(".php", $url2[1]);
	//$title = $groupname[0];
	
?>

<nav class="nav-wrap clearfix">
    <div class="container">
        <a href="#"><img src="img/Hospitality_logo_web.png" alt="hospitality logo"></a>
        
        <ul class="navbar-right clearfix"> 
            <li><a href="visits.php">Visits</a></li> 
            <li><a href="logout.php">Logout</a></li>    
        </ul>  
        <a href="#" id="pull">Menu</a>
    </div>  
</nav>  