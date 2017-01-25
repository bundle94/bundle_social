<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id=$_POST['id'];
	
	$sql="DELETE FROM feeds WHERE id={$id}";
	$query=$connection->query($sql);
	if($query)
	{
		$fsql="DELETE FROM comments WHERE post_id={$id}";
		$fquery=$connection->query($fsql);
		if($fquery)
		{
			echo "deleted";
		}
		
	}
	else
	{
		echo "An error occured";
	}
	
	
?>