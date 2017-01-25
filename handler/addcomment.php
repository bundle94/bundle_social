<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id=$_POST['post_id'];
	$comment=sanitize($_POST['comment']);
	
	$time1 = date("Y-m-d H:i:s");
	$sql="INSERT INTO comments (username,comment,post_id,date_time) VALUE ('{$_SESSION['username']}','{$comment}',{$id},'{$time1}')";
	$query=$connection->query($sql);
	if($query)
	{
		$fsql="UPDATE feeds SET date_time='{$time1}',user_modified='{$_SESSION['username']}',what_modified='comment' WHERE id={$id}";
		$fquery=$connection->query($fsql);
		if($fquery)
		{
			echo "added";
		}
	}
	else
	{
		echo "error";
	}
?>