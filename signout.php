<?php
require_once("includes/db.inc");
session_start();

//$sql="DELETE FROM online_friends WHERE username='{$_SESSION['username']}'";
//$query=$connection->query($sql);

$time1 = date("Y-m-d H:i:s");

	$result_set="UPDATE online_friends SET status='OFF',time='{$time1}' WHERE username='{$_SESSION['username']}'";
	$ques=$connection->query($result_set);

$_SESSION=array();

if(isset($_COOKIE[session_name()])){
	setcookie(session_name(),'',time()-42000,'/');
}

session_destroy();

header("location:login.php");
?>