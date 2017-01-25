<?php
	session_start();
	require_once("../includes/db.inc");
		
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}
	
	$sql="UPDATE messages SET status=0 WHERE sender='{$username}' AND receiver='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query)
	{
		echo "updated";
	}
	else
	{
		echo "error";
	}
?>