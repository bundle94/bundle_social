<?php
	ob_start();
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	sleep(2);
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	
	$sql="SELECT * FROM members WHERE email='{$email}' AND password='{$password}'";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		$username = get_user_username($email);
		$name = get_user_loggedname($email);
		$_SESSION['username']=$username;
		$_SESSION['name']=$name;
		$time1 = date("Y-m-d H:i:s");
		//$q ="DELETE FROM online_friends WHERE username='{$_SESSION['username']}'";
		//$que=$connection->query($q);
		if(!get_online_status())
		{
			$result_set="INSERT INTO online_friends (name, time, status, username) 
			VALUES ('{$_SESSION['name']}', '{$time1}', 'ON', '{$_SESSION['username']}')";
			$ques=$connection->query($result_set);
		}
		else
		{
			$result_set="UPDATE online_friends SET status='OFF',time='{$time1}' WHERE username='{$_SESSION['username']}'";
			$ques=$connection->query($result_set);
		}
		/*$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$_SESSION['username']=$r['username'];
			$_SESSION['name']=$r['name'];
			$time1 = date("Y-m-d H:i:s");
			$q ="DELETE FROM online_friends WHERE username='{$_SESSION['username']}'";
			$que=$connection->query($q);
			
			$result_set="INSERT INTO online_friends (name, time, status, username) 
			VALUES ('{$_SESSION['name']}', '{$time1}', 'ON', '{$_SESSION['username']}')";
			$ques=$connection->query($result_set);
		}*/
		if(isset($_POST['rem']) && !empty($_POST['rem']))
		{
			setcookie("username",$username,time()+(60*60*24*7));
		}
		echo $username;
	}
	else
	{
		echo 1;
	}
?>