<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
	}
	
	$sql="SELECT pic FROM feeds WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo $r['pic'];
		}
	}
	else
	{
		echo 0;
	}
	
?>