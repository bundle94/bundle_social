<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id=$_POST['post_id'];
	
	$sql="DELETE FROM likes WHERE post_id={$id} AND username='{$_SESSION['username']}'";
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