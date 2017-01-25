<?php
session_start();
	if(isset($_COOKIE['username']))
	{
		$_SESSION['username']=$_COOKIE['username'];
	}
require_once("db.inc");
	
	$tm = date("Y-m-d H:i:s");
	$q="UPDATE online_friends SET status='ON',time='{$tm}' WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($q);
	
	$gap=10;
	$tm1=date("Y-m-d H:i:s", mktime(date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
	$que ="UPDATE online_friends SET status='OFF' WHERE time <'{$tm1}'";
	$query1=$connection->query($que);
	
?>