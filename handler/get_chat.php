<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}
	if($_SESSION['username']==$username)
	{
		$sql1="UPDATE messages SET status=0 WHERE sender='{$username}' AND receiver='{$_SESSION['username']}' OR sender='{$_SESSION['username']}' AND receiver='{$username}'";
		$query1=$connection->query($sql1);
	}
	$sql="SELECT * FROM messages WHERE sender='{$username}' AND receiver='{$_SESSION['username']}' OR sender='{$_SESSION['username']}' AND receiver='{$username}' ORDER BY id DESC";
	//$sql="SELECT * FROM messages WHERE sender='bundle'";
	$query=$connection->query($sql);

	if($query->rowCount()==0)
	{
		echo "<h5 style='text-align:center'><img src='uploads/services2.png'width='25'height='25'/> Start a conversation now</h4>";
	}
	else
	{
								  
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
									/*if($_SESSION['username']==$r['sender'])
									{
										$sql1="UPDATE messages SET status=0 WHERE sender='{$username}' AND receiver='{$_SESSION['username']}' OR sender='{$_SESSION['username']}' AND receiver='{$username}'";
										$query1=$connection->query($sql1);
									}*/
									
									if($r['sender']!=$_SESSION['username'])
									{
									  echo "<div class='direct-chat-msg'>
										<div class='direct-chat-info clearfix'>
										  <span class='direct-chat-name pull-left'>".get_user_name($r['sender'])."</span>
										  <span class='direct-chat-timestamp pull-right'>".get_time_interval_sm($r['time1'])."</span>
										</div>
										<img class='direct-chat-img' src='uploads/".get_profile_photo($r['sender'])."'alt='message user image' />
										<div class='direct-chat-text'>
										  {$r['message']}
										</div>
									  </div>";
									}
									else
									{
									 echo "<div class='direct-chat-msg right'>
										<div class='direct-chat-info clearfix'>
										  <span class='direct-chat-name pull-right'>".get_user_name($r['sender'])."</span>
										  <span class='direct-chat-timestamp pull-left'>".get_time_interval_sm($r['time1'])."</span>
										</div>
										<img class='direct-chat-img' src='uploads/".get_profile_photo($r['sender'])."'alt='message user image' />
										<div class='direct-chat-text'>
										  {$r['message']}
										</div>
									  </div>";
									}
									
									
		}

	}


?>