<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['about']))
	{
		$about=sanitize($_POST['about']);
	}
	
	$sql="UPDATE members SET about='{$about}' WHERE username='{$_SESSION['username']}'";
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