<?php
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$id=$_POST['id'];
	$msg=sanitize($_POST['msg']);
	
	$sql="UPDATE comments SET comment='{$msg}' WHERE id='{$id}'";
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