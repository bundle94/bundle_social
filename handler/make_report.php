<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	
	if(isset($_POST['post_id']))
	{
		$post_id=$_POST['post_id'];
	}	
	if(isset($_POST['rep_about']))
	{
		$rep_about=$_POST['rep_about'];
	}	
	if(isset($_POST['who_about']))
	{
		$who_about=$_POST['who_about'];
	}	
	if(isset($_POST['brief']))
	{
		$brief=sanitize($_POST['brief']);
	}

	$sql="INSERT INTO report (post_id,rep_about,who_about,brief_about,username) VALUES ('{$post_id}','{$rep_about}','{$who_about}','{$brief}','{$_SESSION['username']}')";
	$query=$connection->query($sql);
	if($query)
	{
		echo "reported";
	}
	else
	{
		echo "error";
	}
?>