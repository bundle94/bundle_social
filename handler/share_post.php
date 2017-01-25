<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$post_id = $_POST['post_id'];
	$username = $_POST['username'];
	$post = $_POST['post'];
	$real_post = $_POST['real_post'];
	
	$time1 = date("Y-m-d H:i:s");
	
	if($post=="post")
	{
		$sql="INSERT INTO feeds (post,username,date_time,enviroment,shared,origin_date) VALUES ('{$real_post}','{$_SESSION['username']}','{$time1}',
		'share','{$username}','{$time1}')";
	}	
	if($post=="picture")
	{
		$sql="INSERT INTO feeds (pic,username,date_time,enviroment,shared,origin_date) VALUES ('{$real_post}','{$_SESSION['username']}','{$time1}',
		'share','{$username}','{$time1}')";
	}	
	if($post=="video")
	{
		$sql="INSERT INTO feeds (short_clip,username,date_time,enviroment,shared,origin_date) VALUES ('{$real_post}','{$_SESSION['username']}','{$time1}',
		'share','{$username}','{$time1}')";
	}
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