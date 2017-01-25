<?php
	require("../includes/functions.php");
	
	if(isset($_GET['user']))
	{
		$user=$_GET['user'];
	}
	
	get_user_following($user);
?>