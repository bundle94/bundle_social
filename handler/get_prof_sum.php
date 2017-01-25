<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$username = $_POST['username'];
	
	$sql="SELECT * FROM members WHERE username='{$username}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div style='width:350px;height:200px;margin:100px auto;background:#fff;background:linear-gradient(#fff,#999)'>
				<div style='background-image:url(uploads/".get_user_cover_photo($r['username']).")'>
					<img src='uploads/".get_profile_photo($r['username'])."'width='90'height='90'style='margin-top:10px'/>
				</div>
				<div style='margin-left:10px;color:#fff'>
					<h5>".get_user_name($r['username'])."</h5>";
					if($r['username']!=$_SESSION['username']){echo "<i class='ion-person-stalker'style='color:purple;font-size:12px'></i> ";echo "<span style='font-size:12px'>".get_num_mutual_friends($r['username'])."</span><br/>";}else{echo "Me<br/>";}
					echo "<span style='font-size:12px'><i class='fa fa-map-marker'style='color:purple;font-size:12px'></i> ".get_location($r['username'])."</span><br/>";
					echo "<span style='font-size:12px'><i class='fa fa-map-calendar'style='color:purple;font-size:12px'></i> ".get_dob($r['username'])."</span><br/>
				</div>
			</div>";
		}
	}
	
?>