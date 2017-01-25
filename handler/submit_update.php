<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$name=sanitize($_POST['name']);
	$email=sanitize($_POST['email']);
	$phone=sanitize($_POST['phone']);
	$location1=sanitize($_POST['location1']);
	$high_school=sanitize($_POST['high_school']);
	$college=sanitize($_POST['college']);
	
	$sql="UPDATE members SET name='{$name}',email='{$email}',phone_number='{$phone}',location1='{$location1}',high_school='{$high_school}',college='{$college}' WHERE username='{$_SESSION['username']}'";
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