<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}
	if(isset($_POST['message']))
	{
		$message=sanitize($_POST['message']);
	}
	
	$tt=time();
	$time2 = date('Y-m-d H:i:s',$tt);
	
	$sql="INSERT INTO messages (sender,receiver,message,time1,status) VALUES ('{$_SESSION['username']}','{$username}','{$message}','{$time2}',1)";
	$query=$connection->query($sql);
	if($query)
	{
		echo "sent";
	}
	else
	{
		echo "error";
	}

?>