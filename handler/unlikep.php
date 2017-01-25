<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$username=$_POST['username'];
	
	$sql="DELETE FROM likes WHERE username='{$username}'";
	$query=$connection->query($sql);
	if($query)
	{
		echo "deleted";
	}
	else
	{
		echo "error";
	}
?>