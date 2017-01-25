<?php

	require_once("../includes/functions.php");
	
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}
	get_photos_dia($username);

?>