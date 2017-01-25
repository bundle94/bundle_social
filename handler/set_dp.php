<?php	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['image']))
	{
		$image=$_POST['image'];
	}
	
	$sql="UPDATE members SET photo='{$image}' WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query)
	{
		echo "success";
	}
	else
	{
		echo "failure";
	}
	
?>