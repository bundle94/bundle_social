<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$username=$_POST['username'];
	
	$time1 = date("Y-m-d H:i:s");
	$sql="INSERT INTO friends (following,follower,status,time1) VALUE ('{$username}','{$_SESSION['username']}',1,'{$time1}')";
	$query=$connection->query($sql);
	if($query)
	{
		echo "added";
	}
	else
	{
		echo "error";
	}
?>