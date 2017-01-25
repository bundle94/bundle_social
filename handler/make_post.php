<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	//$id=$_POST['post_id'];
	$post=sanitize($_POST['post']);
	
	$time1 = date("Y-m-d H:i:s");
	$sql="INSERT INTO feeds (username,post,date_time,origin_date) VALUE ('{$_SESSION['username']}','{$post}','{$time1}','{$time1}')";
	$query=$connection->query($sql);
	if($query)
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
?>