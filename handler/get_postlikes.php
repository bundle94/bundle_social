<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
	}	
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}	
	if(isset($_POST['like_id']))
	{
		$like_id=$_POST['like_id'];
	}
	$lsql="SELECT * FROM likes WHERE post_id={$id}";
	$query2=$connection->query($lsql);
	$num_likes=$query2->rowCount();
	
	if(get_likes_status($id)){echo "<i class='fa fa-eye'style='font-size:12px'></i> <a href='#'style='font-size:12px;color:blue'onclick=\"view({$id})\">View likes</a> ";}if($num_likes>0){ echo "<span style='font-size:12px'>(".$num_likes.")</span> ";}
	if(!get_likes($id))
	{
		echo "<i class='glyphicon glyphicon-thumbs-up'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"likep({$id},'{$username}','{$like_id}')\">Like</a> ";
	}
	else
	{ 
		echo " <i class='glyphicon glyphicon-thumbs-down'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"unlikepro({$id},'{$username}','{$like_id}')\">Unlike</a> ";
	}


?>