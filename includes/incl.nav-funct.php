<?php

	$currentPage = $_SERVER['SCRIPT_NAME'];
	$url = explode("/", $currentPage);
	$page = end($url);
	//$url2 = explode("m_", $page);
	//$groupname = explode(".php", $url2[1]);
	//$title = $groupname[0];
	
?>

<nav class="clearfix">  
    <ul class="clearfix">  
        <li><a href="activities.php">Activities</a></li>  
        <li><a href="mood.php">Mood</a></li>  
        <li><a href="visits.php">Visits</a></li> 
        <li><a href="logout.php">Logout</a></li>    
    </ul>  
    <a href="#" id="pull">Menu</a>  
</nav>  