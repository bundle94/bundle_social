<?php
	require("../includes/functions.php");
	require("../includes/db.inc");
	
	sleep(1);
	
	if(isset($_GET['user']) && !empty($_GET['user']))
	{
		$user=$_GET['user'];
	}
	
	$query=$connection->query("SELECT following,follower FROM friends WHERE following='{$user}' OR follower='{$user}' AND status=1");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query as $r)
	{
		$following=get_profile_photo($r['following']);
		$follower=get_profile_photo($r['follower']);
		$friends=array('following'=>$following,'follower'=>$follower);
		echo json_encode($friends);
	}
?>
