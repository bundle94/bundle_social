<?php
session_start();
require_once("db.inc");


function get_user_image()
{
	global $connection;
	$sql="SELECT photo FROM members WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$photo="";
	foreach($query as $r)
	{
		$photo=$r['photo'];
	}
	return $photo;
}

function get_user_username($email)
{
	global $connection;
	$sql="SELECT username FROM members WHERE email='{$email}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query as $r)
	{
		return $r['username'];
	}
}

function get_user_loggedname($email)
{
	global $connection;
	$sql="SELECT name FROM members WHERE email='{$email}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query as $r)
	{
		return $r['name'];
	}
}

function get_user_email()
{
	global $connection;
	$sql="SELECT email FROM members WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$email="";
	foreach($query as $r)
	{
		$email=$r['email'];
	}
	return $email;
}

function get_user_name($user)
{
	global $connection;
	$sql="SELECT name FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$name="";
	foreach($query as $r)
	{
		$name=$r['name'];
	}
	return $name;
}

function get_profile_photo($user)
{
	global $connection;
	$sql="SELECT photo FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$photo="";
	foreach($query as $r)
	{
		$photo=$r['photo'];
	}
	return $photo;
}

function get_user_cover_photo($user)
{
	global $connection;
	$sql="SELECT cover_photo FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$cover_photo="";
	foreach($query as $r)
	{
		$cover_photo=$r['cover_photo'];
	}
	return $cover_photo;
}

function get_user_friend_status($user)
{
	global $connection;
	$sql="SELECT following FROM friends WHERE following='{$user}' AND follower='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		if($user==$_SESSION['username'])
		{
			return true;
		}
		return false;
	}
}

function get_likes_status($id)
{
	global $connection;
	$sql="SELECT * FROM likes WHERE post_id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_profile($user)
{
	global $connection;
	$sql="SELECT * FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	foreach($query as $r)
	{
		$name=$r['name'];
		$username=$r['username'];
		$email=$r['email'];
		$phone=$r['phone_number'];
		$high_school=$r['high_school'];
		$college=$r['college'];
		$location=$r['location1'];
	}
	return $array=array('name'=>$name,'username'=>$username,'email'=>$email,'phone_number'=>$phone,'high_school'=>$high_school,'college'=>$college,'location'=>$location);
}

function get_profile_status($user)
{
	global $connection;
	$sql="SELECT username FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$username="";
	foreach($query as $r)
	{
		$username=$r['username'];
	}
	return $username;
}

function check_for_photos($user)
{
	global $connection;
	$sql="SELECT pic FROM feeds WHERE pic IS NOT NULL AND username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return false;
	}
	else
	{
		return true;
	}
	
}

function get_user_photos($user)
{
	global $connection;
	$sql="SELECT id,pic FROM feeds WHERE pic IS NOT NULL AND username='{$user}' LIMIT 0, 12";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	//$array=array();
	foreach($query as $r)
	{
		//$array[$r['id']]=$r['pic'];
		echo "<div style='float:left;margin-left:10px;margin-bottom:5px'><a href='#' onclick=\"picdialog({$r['id']},'{$user}')\"><img src='uploads/{$r['pic']}'width='75'height='75'/></a></div>";
	}
	//return $array;
}

function get_user_follower($user)
{
	global $connection;
	$sql_pag="SELECT COUNT(*) FROM friends WHERE following='{$user}'";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=24;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql="SELECT id,follower FROM friends WHERE following ='{$user}' LIMIT $start, $limit";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//$array[$r['id']]=$r['follower'];
			$dp = get_profile_photo($r['follower']);
			echo "<div style='float:left;margin-left:20px;margin-bottom:5px'>";
			//echo "<img src='uploads/{$r}'width='150'height='150'/>";
			echo "<div class='panel panel-default'>";
			echo "<div style='width:200px;height:170px'>
			<span style='z-index:30000;margin-top:140px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:0px;padding:5px;font-size:13px'><a href='social_2.php?user={$r['follower']}&page=1'style='color:white'>".get_user_name($r['follower'])."</a></span>";
			//user_friends($r);
			echo "<img src='uploads/{$dp}'width='200'height='170'/>";
			echo "</div>";
			echo "<div class='panel-body'>";
			echo "<i class='ion-person-stalker'></i> ";echo "<span>".get_num_mutual_friends($r['follower'])."</span><br/>";
			echo "<span><i class='fa fa-map-marker'></i> ".get_location($r['follower'])."</span><br/>";
			user_friends($r['follower']);
			echo "</div>";
			echo "</div>";
			echo "</div>";								
		}
						echo "<div align='center'id='paginate1'>";
					$previous=$page-1;
					$next=$page+1;
					$total_num_pages=ceil($totalpage1/$limit);
					if($total_num_pages>1)
					{
						if($previous>=1)
						{
							//echo "<button type='button'class='btn btn_primary'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate('{$user}',{$page})\">&laquo; previous</button> ";
						}
						if($next<=$total_num_pages)
						{
							echo "<button type='button'class='btn btn_primary btn-sm form-control'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginatef({$next},'{$user}')\">Show more people</a></button> ";
						}
					}
					echo "</div>";
	}
	else
	{
		echo "<h4>This user has no followers</h4>";
	}
}
function get_user_following($user)
{
	global $connection;
	$sql_pag="SELECT COUNT(*) FROM friends WHERE follower='{$user}'";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=24;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql="SELECT id,following FROM friends WHERE follower ='{$user}' LIMIT $start, $limit";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//$array[$r['id']]=$r['follower'];
			$dp = get_profile_photo($r['following']);
			echo "<div style='float:left;margin-left:20px;margin-bottom:5px'>";
			//echo "<img src='uploads/{$r}'width='150'height='150'/>";
			echo "<div class='panel panel-default'>";
			echo "<div style='width:200px;height:170px'>
			<span style='z-index:30000;margin-top:140px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:0px;padding:5px;font-size:13px'><a href='social_2.php?user={$r['following']}&page=1'style='color:white'>".get_user_name($r['following'])."</a></span>";
			//user_friends($r);
			echo "<img src='uploads/{$dp}'width='200'height='170'/>";
			echo "</div>";
			echo "<div class='panel-body'>";
			if($r['following']!=$_SESSION['username']){echo "<i class='ion-person-stalker'></i> ";echo "<span>".get_num_mutual_friends($r['following'])."</span><br/>";}else{echo "Me<br/>";}
			echo "<span><i class='fa fa-map-marker'></i> ".get_location($r['following'])."</span><br/>";
			user_friends($r['following']);
			echo "</div>";
			echo "</div>";
			echo "</div>";								
		}
						echo "<div align='center'id='paginate2'>";
					$previous=$page-1;
					$next=$page+1;
					$total_num_pages=ceil($totalpage1/$limit);
					if($total_num_pages>1)
					{
						if($previous>=1)
						{
							//echo "<button type='button'class='btn btn_primary'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate('{$user}',{$page})\">&laquo; previous</button> ";
						}
						if($next<=$total_num_pages)
						{
							echo "<button type='button'class='btn btn_primary btn-sm form-control'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginatefo({$next},'{$user}')\">Show more people</a></button> ";
						}
					}
					echo "</div>";
	}
	else
	{
		echo "<h4>This user is following nobody</h4>";
	}
}

function get_search($user)
{
	global $connection;
	$sql="SELECT * FROM members WHERE name LIKE '%{$user}%' OR username LIKE '%{$user}%'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//$array[$r['id']]=$r['follower'];
			$dp = get_profile_photo($r['username']);
			echo "<div style='float:left;margin-left:20px;margin-bottom:5px'>";
			//echo "<img src='uploads/{$r}'width='150'height='150'/>";
			echo "<div class='panel panel-default'>";
			echo "<div style='width:200px;height:170px'>
			<span style='z-index:30000;margin-top:140px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:0px;padding:5px;font-size:13px'><a href='social_2.php?user={$r['username']}'style='color:white'>".get_user_name($r['username'])."</a></span>";
			//user_friends($r);
			echo "<img src='uploads/{$dp}'width='200'height='170'/>";
			echo "</div>";
			echo "<div class='panel-body'>";
			if($r['username']!=$_SESSION['username']){echo "<i class='ion-person-stalker'></i> ";echo "<span>".get_num_mutual_friends($r['username'])."</span><br/>";}else{echo "Me<br/>";}
			echo "<span><i class='fa fa-map-marker'></i> ".get_location($r['username'])."</span><br/>";
			user_friends($r['username']);
			echo "</div>";
			echo "</div>";
			echo "</div>";								
		}
	}
	else
	{
		echo "<h2>No user found, please try a better search term</h2>";
	}
}

function check_for_videos($user)
{
	global $connection;
	$sql="SELECT short_clip FROM feeds WHERE short_clip IS NOT NULL AND username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return false;
	}
	else
	{
		return true;
	}
	
}

function get_user_videos($user)
{
	global $connection;
	$sql="SELECT id,short_clip FROM feeds WHERE short_clip IS NOT NULL AND username='{$user}' LIMIT 0, 12";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	foreach($query as $r)
	{
		$array[$r['id']]=$r['short_clip'];
	}
	return $array;
}

function get_user_follow()
{
	global $connection;
	$sql="SELECT * FROM friends WHERE following='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	foreach($query as $r)
	{
		$array[$r['id']]=$r['follower'];
	}
	return $array;
}

function get_people_post()
{
	global $connection;
	//$friends=get_user_follow();
	//$count=1;
	//foreach($friends as $f)
	//{
		//echo $f;
		$sql_pag="SELECT COUNT(*) FROM feeds WHERE username='{$_SESSION['username']}' OR username IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}') OR user_modified IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}')";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=5;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
		$sql="SELECT * FROM feeds WHERE username='{$_SESSION['username']}' OR username IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}') OR user_modified IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}') ORDER BY date_time DESC LIMIT $start, $limit";
		$query=$connection->query($sql);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$array=array();
		if($query->rowCount()>0)
		{
			echo "<div id='p{$page}'>";
			foreach($query as $r)
			{
			
				$csql="SELECT * FROM comments WHERE post_id='{$r['id']}'";
				$query1=$connection->query($csql);
				$num_comments=$query1->rowCount();			
				$lsql="SELECT * FROM likes WHERE post_id='{$r['id']}'";
				$query2=$connection->query($lsql);
				$num_likes=$query2->rowCount();
			echo "<div class='well'style='border-top:3px solid purple'id='z{$r['id']}'>";
				if($r['what_modified']=="comment")
				{
					/*$user = get_last_two_comments($r['id']);
					foreach($user as $p)
					{
						echo "<span style='font-size:11px'>".get_user_name($p).", </span>";
					}*/
					if($_SESSION['username']==$r['user_modified']){ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>You</a></b></span>";} else{ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>".get_user_name($r['user_modified'])."</a></b></span>";}
					if($r['username']==$_SESSION['username']){ echo" <span style='font-size:13px'>commented on your post </span><br/>";}else{ echo" <span style='font-size:13px'>commented on this </span><br/>";}
				}
				if($r['what_modified']=="like")
				{
					if($_SESSION['username']==$r['user_modified']){ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>You</a></b></span>";} else{ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>".get_user_name($r['user_modified'])."</a></b></span>";}
					if($r['username']==$_SESSION['username']){ echo" <span style='font-size:13px'>liked your post </span><br/>";}else{ echo" <span style='font-size:13px'>liked this </span><br/>";}
				}
				if($r['enviroment']=="share")
				{
					echo "<span style='font-size:13px'><b>".get_user_name($r['username'])."</b> shared <b>".get_user_name($r['shared'])."'s</b> post</span><br/>";
				}
				
				echo "<span class='pull-right'style='font-size:12px'><i class='fa fa-clock-o'style='font-size:12px'></i> ".get_time_interval($r['date_time'])."</span>"; 
				echo "<img src='uploads/".get_profile_photo($r['username'])."'width='40'height='40'/> &nbsp;&nbsp;&nbsp;";echo "<span style='color:black;font-size:13px'><b>";if($r['enviroment']!=NULL){echo "<a href='group.php?user={$r['username']}&page=1'";} else {echo "<a href='social_2.php?user={$r['username']}&page=1'";} echo "style='color:black'onmouseover=\"show_summary('#s{$r['id']}','{$r['username']}')\"onmouseout=\"hide_summary('#s{$r['id']}')\">".get_user_name($r['username'])."</a></b> | <i class='fa fa-caret-down'style='font-size:13px'></i> <a href='#'style='color:blue;font-size:13px'onclick=\"more('#{$r['id']}')\">More</a></span><br/>";
				echo "<div id='s{$r['id']}'style='display:none;z-index:40000;position:absolute;margin-top:0px;margin-left:10px'>
	
				</div>";
				echo "<ul style='display:none'id='{$r['id']}'>";
				if($_SESSION['username']==$r['username']){ echo "<li style='list-style:none;font-size:11px'><i class='fa fa-trash'style='font-size:11px'></i><a href='#'onclick=\"postdel({$r['id']},'#z{$r['id']}')\"> Delete</a></li>";}
				if($_SESSION['username']==$r['username'] && $r['post']!=NULL){ echo "<li style='list-style:none;font-size:11px'><i class='fa fa-pencil'style='font-size:11px'></i><a href='#'onclick=\"postedit({$r['id']},'#zz{$r['id']}')\"> Edit</a></li>";}
				if($r['post']==NULL){echo "<li style='list-style:none;font-size:11px'><i class='fa fa-cloud'style='font-size:11px'></i><a href='download.php?name=";if($r['pic']!=NULL){ echo "{$r['pic']}";}else{echo "{$r['short_clip']}";}echo "'> Download</a></li>";}
				echo "<li style='list-style:none;font-size:11px'><i class='fa fa-eye-slash'style='font-size:11px'></i><a href='#'onclick=\"hidepost('#z{$r['id']}')\"> Hide post</a></li>";
				echo "<li style='list-style:none;font-size:11px'><i class='fa fa-pencil-square-o'style='font-size:11px'></i><a href='#'onclick=\"postrep({$r['id']})\"> Report</a></li>
				</ul>";
				if($r['enviroment']=="channel")
				{
					echo "<span style='color:blue'>Posted by</span> <span style='color:black;font-size:13px'><b><a href='social_2.php?user={$r['author']}&page=1'style='color:black'onmouseover=\"show_summary('#s{$r['id']}','{$r['author']}')\"onmouseout=\"hide_summary('#s{$r['id']}')\">".get_user_name($r['author'])."</a></b></span>";if(channel_creator($r['username'])==$r['author']){echo " <span style='font-size:13px'>(Community Admin)</span><br/>";}else{echo "<span style='font-size:13px'>(Member since ".get_time_interval_sm(get_time_joined_group($r['author'],$r['username']))." ago)</span><br/>";}
				}
				if($r['post']!=NULL)
				{
					echo "<div id='zz{$r['id']}'>";
						echo $r['post']."<br/>";
					echo "</div>";
				}
				else if($r['pic']!=NULL)
				{
					echo "<span style='font-size:13px'>".$r['pic_caption']."</span><br/>";
					echo "<a href='#'onclick=\"picdialog({$r['id']},'{$r['username']}')\"><img src='uploads/{$r['pic']}'width='500'height='auto'style='border:3px solid white;border-radius:2px'/></a><br/>";
				}
				else
				{
					echo "<span style='font-size:13px'>".$r['clip_caption']."</span><br/>";
					echo "<video src='uploads/{$r['short_clip']}'width='500'height='300'controls='controls'></video><br/>";
				}
				echo "<span id='l{$r['id']}'>";
				if(get_likes_status($r['id'])){echo "<i class='fa fa-eye'style='font-size:12px'></i> <a href='#'style='font-size:12px;color:blue'onclick=\"view({$r['id']})\">View likes</a> ";}if($num_likes>0){ echo "<span style='font-size:12px'>(".$num_likes.")</span> ";}
					if(!get_likes($r['id']))
					{
						echo "<i class='glyphicon glyphicon-thumbs-up'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"likep({$r['id']},'{$r['username']}','#l{$r['id']}')\">Like</a>&nbsp;&nbsp;";
					}
					else
					{ 
						echo " <i class='glyphicon glyphicon-thumbs-down'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"unlikepro({$r['id']},'{$r['username']}','#l{$r['id']}')\">Unlike</a>";
					}
				echo"</span>";
				if($num_comments>0){echo "<span style='font-size:12px'>(".$num_comments.")</span> ";}else{echo "";} echo "<i class='glyphicon glyphicon-comment'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"comment('#c{$r['id']}',{$r['id']})\"class='com'>Comment</a>&nbsp;&nbsp; <a href='#'style='font-size:12px;color:blue'onclick=\"share({$r['id']},'{$r['username']}')\"><i class='glyphicon glyphicon-share-alt'style='font-size:12px'></i> Share</a><br/><br/>";
				echo "<div id='c{$r['id']}'style='display:block;max-height:300px;overflow:auto'></div>";
				echo "<div class='input-group text-center'><input type='text'class='form-control input-sm'placeholder='Share your comment...'id='i{$r['id']}'/>
				<span class='input-group-btn'><button type='button'class='btn btn-primary btn-sm btn-flat'onclick=\"addcomment('#c{$r['id']}','#i{$r['id']}',{$r['id']},'{$r['username']}',{$page})\">OK</button></span></div>";
				echo "</div>";
			}
				echo "<div align='center'id='paginate1'>";
				$previous=$page-1;
				$next=$page+1;
				$total_num_pages=ceil($totalpage1/$limit);
				if($total_num_pages>1)
				{
					if($previous>=1)
					{
						//echo "<button type='button'class='btn btn_primary'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate('{$user}',{$page})\">&laquo; previous</button> ";
					}
					if($next<=$total_num_pages)
					{
						echo "<button type='button'class='btn btn_primary btn-sm form-control'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate1({$next})\">Load more stories</a></button> <br/><br/><br/>";
					}
				}
				echo "</div>";
				echo "<div id='paginate'></div>";
			echo "</div>";
		}
		else
		{
			echo "<div align='center'style='margin-top:250px;border:3px solid white'><h3>This user currently does not have any post</h3></div>";
		}
		
	
	
}

function get_user_posts($user)
{
	global $connection;
	$sql_pag="SELECT COUNT(*) FROM feeds WHERE username='{$user}'";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=3;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql="SELECT * FROM feeds WHERE username='{$user}' ORDER BY date_time DESC LIMIT $start, $limit";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	if($query->rowCount()>0)
	{
		echo "<div id='p{$page}'>";
		foreach($query as $r)
		{
			$csql="SELECT * FROM comments WHERE post_id='{$r['id']}'";
			$query1=$connection->query($csql);
			$num_comments=$query1->rowCount();			
			$lsql="SELECT * FROM likes WHERE post_id='{$r['id']}'";
			$query2=$connection->query($lsql);
			$num_likes=$query2->rowCount();
			echo "<div class='well'style='border-top:3px solid purple'id='z{$r['id']}'>";
			echo "<span class='pull-right'style='font-size:12px'><i class='fa fa-clock-o'style='font-size:12px'></i> ".get_time_interval($r['date_time'])."</span>"; 
			echo "<img src='uploads/".get_profile_photo($r['username'])."'width='40'height='40'/> &nbsp;&nbsp;&nbsp;";echo "<span style='color:black;font-size:13px'><b>";if($r['enviroment']!=NULL){echo "<a href='group.php?user={$r['username']}&page=1'";} else {echo "<a href='social_2.php?user={$r['username']}&page=1'";} echo "style='color:black'onmouseover=\"show_summary('#s{$r['id']}','{$r['username']}')\"onmouseout=\"hide_summary('#s{$r['id']}')\">".get_user_name($r['username'])."</a></b> | <i class='fa fa-caret-down'style='font-size:13px'></i> <a href='#'style='color:blue;font-size:13px'onclick=\"more('#{$r['id']}')\">More</a></span><br/>";
			echo "<div id='s{$r['id']}'style='display:none;z-index:40000;position:absolute;margin-top:0px;margin-left:10px'>
			<div style='width:350px;height:200px;margin:100px auto;background:#fff;background:linear-gradient(#fff,#999)'>
			<a href='#'onclick='view()'style='background:#606061;color:#FFFFFF;line-height:25px;position:absolute;right:450px;text-align:center;top:90px;width:24px;text-decoration:none;font-weight:bold;border-radius:12px;box-shadow:1px 1px 3px #000'>X</a>
				<div style='background-image:url(uploads/".get_user_cover_photo($r['username']).")'>
					<img src='uploads/".get_profile_photo($r['username'])."'width='90'height='90'style='margin-top:10px;'/>
				</div>
				<div style='margin-left:10px;color:#fff'>
					<h5>".get_user_name($r['username'])."</h5>";
					if($r['username']!=$_SESSION['username']){echo "<i class='ion-person-stalker'style='color:purple;font-size:12px'></i> ";echo "<span style='font-size:12px'>".get_num_mutual_friends($r['username'])."</span><br/>";}else{echo "Me<br/>";}
					echo "<span style='font-size:12px'><i class='fa fa-map-marker'style='color:purple;font-size:12px'></i> ".get_location($r['username'])."</span><br/>";
					echo "<span style='font-size:12px'><i class='fa fa-map-calendar'style='color:purple;font-size:12px'></i> ".get_dob($r['username'])."</span><br/>
				</div>
			</div>
			</div>";
			
			echo "<ul style='display:none'id='{$r['id']}'>";
			if($_SESSION['username']==$user){ echo "<li style='list-style:none;font-size:11px'><i class='fa fa-trash'style='font-size:11px'></i><a href='#'onclick=\"postdel({$r['id']},'#p{$page}',{$page})\"> Delete</a></li>";}
			if($_SESSION['username']==$user){ echo "<li style='list-style:none;font-size:11px'><i class='fa fa-pencil'style='font-size:11px'></i><a href='#'onclick=\"postedit({$r['id']})\"> Edit</a></li>";}
			if($r['post']==NULL){echo "<li style='list-style:none;font-size:11px'><i class='fa fa-cloud'style='font-size:11px'></i><a href='download.php?name=";if($r['pic']!=NULL){ echo "{$r['pic']}";}else{echo "{$r['short_clip']}";}echo "'> Download</a></li>";}
			echo "<li style='list-style:none;font-size:11px'><i class='fa fa-eye-slash'style='font-size:11px'></i><a href='#'onclick=\"hidepost('#z{$r['id']}')\"> Hide post</a></li>";
			echo "<li style='list-style:none;font-size:11px'><i class='fa fa-pencil-square-o'style='font-size:11px'></i><a href='#'onclick=\"postrep({$r['id']})\"> Report</a></li>
			</ul>";
				if($r['enviroment']=="share")
				{
					echo "<span style='font-size:13px'><b>".get_user_name($r['username'])."</b> shared <b>".get_user_name($r['shared'])."'s</b> post</span><br/>";
				}
			if($r['what_modified']=="comment")
			{
					if($_SESSION['username']==$r['user_modified']){ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>You</a></b></span>";} else{ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>".get_user_name($r['user_modified'])."</a></b></span>";}
					if($r['username']==$_SESSION['username']){ echo" <span style='font-size:13px'>commented on your post </span><br/>";}else{ echo" <span style='font-size:13px'>commented on this </span><br/>";}
			}
			if($r['what_modified']=="like")
			{
					if($_SESSION['username']==$r['user_modified']){ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>You</a></b></span>";} else{ echo "<span style='font-size:13px'><b><a href='social_2.php?user={$r['username']}'>".get_user_name($r['user_modified'])."</a></b></span>";}
					if($r['username']==$_SESSION['username']){ echo" <span style='font-size:13px'>liked your post </span><br/>";}else{ echo" <span style='font-size:13px'>liked this </span><br/>";}
			}
			if($r['post']!=NULL)
			{
				echo "<div id='zz{$r['id']}'>";
					echo $r['post']."<br/>";
				echo "</div>";
			}
			else if($r['pic']!=NULL)
			{
				echo "<span style='font-size:13px'>".$r['pic_caption']."</span><br/>";
				echo "<a href='#'onclick=\"picdialog({$r['id']},'{$r['username']}')\"><img src='uploads/{$r['pic']}'width='500'height='auto'style='border:3px solid white;border-radius:2px'/></a><br/>";
			}
			else
			{
				echo "<span style='font-size:13px'>".$r['clip_caption']."</span><br/>";
				echo "<video src='uploads/{$r['short_clip']}'width='500'height='300'controls='controls'></video><br/>";
			}
			echo "<span id='l{$r['id']}'>";
			if(get_likes_status($r['id'])){echo "<i class='fa fa-eye'style='font-size:12px'></i> <a href='#'style='font-size:12px;color:blue'onclick=\"view({$r['id']})\">View likes</a> ";}if($num_likes>0){ echo "<span style='font-size:12px'>(".$num_likes.")</span> ";}
				if(!get_likes($r['id']))
				{
					echo "<i class='glyphicon glyphicon-thumbs-up'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"likep({$r['id']},'{$r['username']}','#l{$r['id']}')\">Like</a>&nbsp;&nbsp;";
				}
				else
				{ 
					echo " <i class='glyphicon glyphicon-thumbs-down'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"unlikepro({$r['id']},'{$r['username']}','#l{$r['id']}')\">Unlike</a>";
				}
			echo"</span>";
			if($num_comments>0){echo "<span style='font-size:12px'>(".$num_comments.")</span> ";}else{echo "";} echo "<i class='glyphicon glyphicon-comment'style='font-size:12px'></i> <a href='#'style='color:blue;font-size:12px'onclick=\"comment('#c{$r['id']}',{$r['id']})\"class='com'>Comment</a>&nbsp;&nbsp; <a href='#'style='font-size:12px;color:blue'onclick=\"share({$r['id']},'{$r['username']}')\"><i class='glyphicon glyphicon-share-alt'style='font-size:12px'></i> Share</a><br/><br/>";
			echo "<div id='c{$r['id']}'style='display:block;max-height:300px;overflow:auto'></div>";
			echo "<div class='input-group text-center'><input type='text'class='form-control input-sm'placeholder='Share your comment...'id='i{$r['id']}'/>
			<span class='input-group-btn'><button type='button'class='btn btn-primary btn-sm btn-flat'onclick=\"addcomment('#c{$r['id']}','#i{$r['id']}',{$r['id']},'{$r['username']}',{$page})\">OK</button></span></div>";
			echo "</div>";
		}
			echo "<div align='center'id='paginate1'>";
			$previous=$page-1;
			$next=$page+1;
			$total_num_pages=ceil($totalpage1/$limit);
			if($total_num_pages>1)
			{
				if($previous>=1)
				{
					//echo "<button type='button'class='btn btn_primary'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate('{$user}',{$page})\">&laquo; previous</button> ";
				}
				if($next<=$total_num_pages)
				{
					echo "<button type='button'class='btn btn_primary btn-sm form-control'style='background-color:purple;border-bottom:2px solid black;color:white'onclick=\"paginate('{$user}',{$next})\">Load more stories</a></button> ";
				}
			}
			echo "</div>";
			echo "<div id='paginate'></div>";
		echo "</div>";
	}
	else
	{
		echo "<div align='center'style='margin-top:250px;border:3px solid white'><h3>This user currently does not have any post</h3></div>";
	}
}

function get_user_exist($user)
{
	global $connection;
	$sql="SELECT username FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function get_user_about()
{
	global $connection;
	$sql="SELECT about FROM members WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	//$about="";
	if($query->rowCount()==1)
	{
		foreach($query as $r)
		{
			if($r['about']!=NULL)
			{
				echo $r['about'];
			}
			else
			{
				echo "<h4 style='text-align:center'>Not available</h4>";
			}
		}
	}
}

function get_time_interval($date){
	$mydate=date("Y-m-d H:i:s");
	$theDiff="";
	$datetime1 = date_create($date);
	$datetime2 = date_create($mydate);
	$interval = date_diff($datetime1, $datetime2);
	$min = $interval->format('%i');
	$sec = $interval->format('%s');
	$hour = $interval->format('%h');
	$mon = $interval->format('%m');
	$day = $interval->format('%d');
	$year = $interval->format('%y');
	if($interval->format('%i%h%d%m%y')=="00000"){
		if($sec<10){
			return "just now";
		}
		else{
			return $sec." seconds ago";
		}
	}
	else if($interval->format('%h%d%m%y')=="0000"){
		if($min==1){
			return $min." minute ago";
		}
		else{
			return $min." minutes ago";
		}
	}
	else if($interval->format('%d%m%y')=="000"){
		if($hour==1){
			return $hour." hour ago";
		}
		else{
			return $hour." hours ago";
		}
	}
	else if($interval->format('%m%y')=="00"){
		if($day==1){
			return $day." day ago";
		}
		else{
			return $day." days ago";
		}
	}
	else if($interval->format('%y')=="0"){
		if($mon==1){
			return $mon." month ago";
		}
		else{
			return $mon." months ago";
		}
	}
	else{
		if($year==1){
			return $year." year ago";
		}
		else{
			return $year." years ago";
		}
	}
}

function get_time_interval_sm($date){
	$mydate=date("Y-m-d H:i:s");
	$theDiff="";
	$datetime1 = date_create($date);
	$datetime2 = date_create($mydate);
	$interval = date_diff($datetime1, $datetime2);
	$min = $interval->format('%i');
	$sec = $interval->format('%s');
	$hour = $interval->format('%h');
	$mon = $interval->format('%m');
	$day = $interval->format('%d');
	$year = $interval->format('%y');
	if($interval->format('%i%h%d%m%y')=="00000"){
		if($sec<10){
			return "just now";
		}
		else{
			return $sec." secs ";
		}
	}
	else if($interval->format('%h%d%m%y')=="0000"){
		if($min==1){
			return $min." min";
		}
		else{
			return $min." mins";
		}
	}
	else if($interval->format('%d%m%y')=="000"){
		if($hour==1){
			return $hour." hr";
		}
		else{
			return $hour." hrs";
		}
	}
	else if($interval->format('%m%y')=="00"){
		if($day==1){
			return $day." day";
		}
		else{
			return $day." days";
		}
	}
	else if($interval->format('%y')=="0"){
		if($mon==1){
			return $mon." mth";
		}
		else{
			return $mon." mths";
		}
	}
	else{
		if($year==1){
			return $year." yr";
		}
		else{
			return $year." yrs";
		}
	}
}

function online_friends()
{
	global $connection;
	$tm = date("Y-m-d H:i:s");
	$q="UPDATE online_friends SET status='ON',time='{$tm}' WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($q);
	
	$gap=10;
	$tm1=date("Y-m-d H:i:s", mktime(date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
	$que ="UPDATE online_friends SET status='OFF' WHERE time <'{$tm1}'";
	$query1=$connection->query($que);
}

function get_friends($user)
{
	global $connection;
	$sql="SELECT follower FROM friends WHERE following='{$user}' AND status=1 LIMIT 0, 12";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	if($query->rowCount()>0)
	{
		foreach($query as $r)
		{
			echo "<div style='float:left;margin-left:10px;margin-bottom:5px'><span style='z-index:30000;margin-top:51px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:5px;padding:3px;border-radius:3px;font-size:12px'>{$r['follower']}</span><img src='uploads/".get_profile_photo($r['follower'])."'width='75'height='75'/></div>";
		}
	}
	else
	{
		echo "This user has no friend(s)";
	}
}

function get_friends_following($user)
{
	global $connection;
	$sql="SELECT following FROM friends WHERE follower='{$user}' AND status=1 LIMIT 0, 12";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	if($query->rowCount()>0)
	{
		foreach($query as $r)
		{
			echo "<div style='float:left;margin-left:10px;margin-bottom:5px'><span style='z-index:30000;margin-top:51px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:5px;padding:3px;border-radius:3px;font-size:12px'>{$r['following']}</span><img src='uploads/".get_profile_photo($r['following'])."'width='75'height='75'/></div>";
		}
	}
	else
	{
		if($user==$_SESSION['username'])
		{
			echo "You're not following anybody";
		}
		else
		{
			echo "This user is following nobody";
		}
	}
}

function get_user_friends($user)
{
	global $connection;
	$sql="SELECT following,follower FROM friends WHERE following='{$user}' OR follower='{$user}' AND status=1";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	//if($query->rowCount()>0)
	//{
		foreach($query as $r)
		{
			$following=$r['following'];
			$follower=$r['follower'];
		}
	//}
	return $array=array('following'=>$following,'follower'=>$follower);
}

function get_follow()
{
	global $connection;
	$sql="SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return false;
	}
	else
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$array=array();
		foreach($query as $r)
		{
			$follower=$r['follower'];
		}
		return $array=array('follower'=>$follower);
	}
	
}

function show_friends()
{
	global $connection;
	//$friends[]=get_follow();
	//foreach($friends as $f)
	//{
		$sql1="SELECT * FROM online_friends WHERE status='ON' AND username IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1)";
		$query1=$connection->query($sql1);
		$query1->setFetchMode(PDO::FETCH_ASSOC);
		if($query1->rowCount()==0)
		{
			echo "Nobody is online";
		}
		else
		{
			echo "<div id='online'>";
			foreach($query1 as $r)
			{
				echo "<img src='uploads/".get_profile_photo($r['username'])."'width='30'height='30'style='margin-top:5px'/><a href='#'onclick=\"message('{$r['username']}')\">".$r['username']."</a><br/>";
			}
			echo "</div>";
		}
		
	//}
}

function get_num_online_friends()
{
	global $connection;
	//$friends[]=get_follow();
	//foreach($friends as $f)
	//{
		$sql1="SELECT * FROM online_friends WHERE status='ON' AND username IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1)";
		$query1=$connection->query($sql1);
		$people=$query1->rowCount();
		
	//}
	return $people;
}
function sanitize($input)
{
	$my_input=htmlspecialchars(addslashes(trim($input)));
	return $my_input;
}

function get_friends_status()
{
	global $connection;
	$sql="SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$array=array();
	if($query->rowCount()>0)
	{
		foreach($query as $r)
		{
			$follower=$r['follower'];
		}
		return $array=array('follower'=>$follower);
	}
}

function get_num_friends($user)
{
	global $connection;
	$sql="SELECT follower FROM friends WHERE following='{$user}' AND status=1";
	$query=$connection->query($sql);
	$num_friends=$query->rowCount();
	if($num_friends==0)
	{
		echo "<span style='font-size:13px'>No friend(s) yet</span>";
	}
	else
	{
		echo "<span style='font-size:13px'>".$num_friends."</span> ";
		if($num_friends==1){ echo "friend";}else{echo "friends";}
	}
}

function get_location($user)
{
	global $connection;
	$sql="SELECT location1 FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return "location not available";
	}
	else
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['location1']==NULL)
			{
				return "Not available";
			}
			else
			{
				$location=$r['location1'];
			}
		}
		return $location;
	}
}

function get_following($user)
{
	global $connection;
	$sql="SELECT following FROM friends WHERE follower='{$user}'";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query as $r)
	{
		$following=$r['following'];
	}
	return $array=array('following'=>$following);
}

function get_likes($user_id)
{
	global $connection;
	$sql="SELECT * FROM likes WHERE post_id={$user_id} AND username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function confirm_following($user)
{
	global $connection;
	$sql="SELECT following FROM friends WHERE follower='{$_SESSION['username']}' AND following='{$user}' AND status=1";
	$query=$connection->query($sql);
	if($query->rowCount()==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function get_people()
{
	global $connection;
	$sql1="SELECT username FROM members WHERE role IS NULL ORDER BY RAND()";
	$query1=$connection->query($sql1);
	$query1->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query1 as $r)
	{
		//echo $r['username']."<br/>";
		if(confirm_following($r['username']))
		{
			if($r['username']==$_SESSION['username'])
			{
				echo "";
			}
			else
			{
				echo "<img src='uploads/".get_profile_photo($r['username'])."'width='50'height='50'/><a href='social_2.php?user={$r['username']}'>".get_user_name($r['username'])."</a>
				<i class='fa fa-map-marker'></i> ".get_location($r['username'])."<br/>";
				echo "<button type='button'name='follow_pro'id='follow_pro'class='btn btn-primary btn-flat btn-sm'style='background-color:purple;border-bottom:2px solid black'>Follow</button><br/><br/>";
			}
		}
	}
	echo "<br/><button type='button'name='refresh'id='refresh'class='btn btn-default btn-flat btn-sm form-control'onclick=\"refresh_people()\">Refresh</button>";
}

function get_photos_dia($user)
{
	global $connection;
	$sql="SELECT id,username,pic,date_time FROM feeds WHERE pic IS NOT NULL AND username='{$user}' ORDER BY RAND() LIMIT 0,12";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//echo "<span style='background:rgba(0,0,0,0.3);font-size:9px;z-index:30000;position:absolute'>".$r['date_time']."</span>";
			echo "<a href='#'onclick=\"picdialog({$r['id']},'{$r['username']}')\"><img src='uploads/{$r['pic']}'width='75'height='75'/>&nbsp;&nbsp;";
		}
	}
}
function resize_image($file,$w,$h,$crop=FALSE)
{
		list($width,$height)=getimagesize($file);
		$r=$width/$height;
		if($crop)
		{
			if($width>$height)
			{
				$width=ceil($width-($width*abs($r-$w/$h)));
			}
			else
			{
				$height=ceil($height-($height*abs($r-$w/$h)));
			}
			$newwidth=$w;
			$newheight=$h;
		}
		else
		{
			if($w/$h>$r)
			{
				$newwidth=$h*$r;
				$newheight=$h;
			}
			else
			{
				$newheight=$w/$r;
				$newwidth=$w;
			}
		}
		$dst=imagecreatetruecolor($newwidth,$newheight);
		$src=imagecreatefromjpeg($file);
		imagecopyresized($dst,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		return imagejpeg($dst);
		
}

function get_download($file)
{
	//$name=$_GET['nama'];
	//$path="uploads/";
	$dir=$file;
	header('Content-Description:File Transfer');
	header('Content-Type:application/octet-stream');
	header('Content-Disposition:attachment;filename='.basename($dir));
	header('Content-Transfer-Encoding:binary');
	header('Expires:0');
	header('Cache-Control:must-revalidate');
	header('Pragma:public');
	header('Content-Length:'.filesize($dir));
	ob_clean();
	flush();
	readfile($dir);
	exit;
}

function get_inbox()
{
	global $connection;
	$sql="SELECT * FROM messages WHERE receiver='{$_SESSION['username']}' AND status=1";
	$query=$connection->query($sql);
	$num_mes=$query->rowCount();
	return $num_mes;
}

function get_notifs()
{
	global $connection;
	$sql="SELECT * FROM notifications WHERE main_person='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	$num_mes=$query->rowCount();
	return $num_mes;
}

function get_msg_inbox()
{
	global $connection;
	$sql="SELECT * FROM messages WHERE receiver='{$_SESSION['username']}' AND status=1 GROUP BY sender ORDER BY id DESC";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo   "<li><!-- start message -->
                        <a href='#'onclick=\"update_inbox('{$r['sender']}')\">
                          <div class='pull-left'>
                            <img src='uploads/".get_profile_photo($r['sender'])."'width='25' height='25' style='border-radius:50%' alt='User Image'/>
                          </div>
                          <h4>
                            {$r['sender']}
                            <small><i class='fa fa-clock-o'></i> ".get_time_interval_sm($r['time1'])."</small>
                          </h4>
                          <p>{$r['message']}</p>
                        </a>
                      </li>";
		}
	}
}

function get_notifications()
{
   global $connection;
   $query=$connection->query("SELECT * FROM notifications WHERE main_person='{$_SESSION['username']}'");
   if($query->rowCount()>0)
   {
       echo "<a href='#'style='font-size:12px'class='pull-right'>Mark all as seen</a><br/>";
	   $query->setFetchMode(PDO::FETCH_ASSOC);
       foreach($query as $r)
	   {
			echo   "<li>
                        <a href='#'onclick=\"update_notif('{$r['caused_person']}')\">
                          <div class='pull-left'>
                            <img src='uploads/".get_profile_photo($r['caused_person'])."'width='25' height='25' style='border-radius:50%' alt='User Image'/>
                          </div>
                          <h4>
                            {$r['caused_person']}
                            <small><i class='fa fa-clock-o'></i> ".get_time_interval_sm($r['date_time'])."</small>
                          </h4>
                          <p>{$r['message']}</p>
                        </a>
                      </li>";
	   }
   }
   else
   {
        echo"<h4 style='text-align:center'>No notifications</h4>";
   }
}

function get_prev_id($id,$username)
{
	global $connection;
	$sql="SELECT id FROM feeds WHERE pic IS NOT NULL AND id<{$id} AND username = '{$username}' ORDER BY id DESC LIMIT 0,1";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_next_id($id,$username)
{
	global $connection;
	$sql="SELECT id FROM feeds WHERE pic IS NOT NULL AND id>{$id} AND username = '{$username}' LIMIT 0,1";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['id'];
		}
	}
}

function get_online_status()
{
	global $connection;
	$sql="SELECT * FROM online_friends WHERE username='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_last_seen($user)
{
	global $connection;
	$sql="SELECT * FROM online_friends WHERE status='OFF' AND username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<h4><b>Last seen:</b> ".get_time_interval($r['time'])."</h4>";
		}
	}
	else
	{
		echo "<h4>User is currently <span style='color:green;font-weight:bold'>online</span></h4>";
	}
}

function get_num_mutual_friends($user)
{
	global $connection;
	$sql="SELECT * FROM friends WHERE status=1 AND following='{$user}' AND follower IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1)";
	$query=$connection->query($sql);
	$mutual=$query->rowCount();
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($mutual>1)
			{
				echo $mutual." mutual friends";
			}
			else
			{
				echo $mutual." mutual friend";
			}
		}
	}
	else
	{
		return "No mutual friend(s)";
	}
}

function get_birthday()
{
	global $connection;
	$t=time();
	$month=strftime('%m',$t);
	$day=strftime('%d',$t);
	$year=strftime('%Y',$t);
	$sql="SELECT year,username FROM members WHERE day='{$day}' AND month='{$month}' AND username IN (SELECT follower FROM friends WHERE following='{$_SESSION['username']}' AND status=1)";
	$query=$connection->query($sql);
	//$mutual=$query->rowCount();
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['year']!=NULL)
			{
				$year_diff=$year-$r['year'];
			}
			echo "<img src='uploads/".get_profile_photo($r['username'])."'width='30'height='30'style='margin-top:5px'/><a href='#'onclick=\"message('{$r['username']}')\">".get_user_name($r['username'])."</a>";if($r['year']!=NULL){echo " ({$year_diff} yrs)";} echo "<br/>";
		}
	}
	else
	{
		echo "No celebrant today";
	}
}

function get_dob($user)
{
	global $connection;
	$sql="SELECT year,day,month,role FROM members WHERE username='{$user}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['day']==01)
			{
				$day="1<sup>st</sup>";
			}			
			if($r['day']==02)
			{
				$day="2<sup>nd</sup>";
			}			
			if($r['day']==03)
			{
				$day="3<sup>rd</sup>";
			}
			if($r['day']>03)
			{
				if($r['day']==04 ||$r['day']==05 || $r['day']==06 || $r['day']==07 || $r['day']==08 || $r['day']==09)
				{
					$f_day=str_replace("0","",$r['day']);
					$day="{$f_day}<sup>th</sup>";
				}
				else if($r['day']==21)
				{
					$day="{$r['day']}<sup>st</sup>";	
				}				
				else if($r['day']==22)
				{
					$day="{$r['day']}<sup>nd</sup>";	
				}				
				else if($r['day']==23)
				{
					$day="{$r['day']}<sup>rd</sup>";	
				}				
				else if($r['day']==31)
				{
					$day="{$r['day']}<sup>st</sup>";	
				}
				else
				{
					$day="{$r['day']}<sup>th</sup>";
				}
			}
			if($r['month']==01)
			{
				$month="January";
			}			
			if($r['month']==02)
			{
				$month="February";
			}			
			if($r['month']==03)
			{
				$month="March";
			}			
			if($r['month']==04)
			{
				$month="April";
			}			
			if($r['month']==05)
			{
				$month="May";
			}			
			if($r['month']==06)
			{
				$month="June";
			}			
			if($r['month']==07)
			{
				$month="July";
			}			
			if($r['month']==08)
			{
				$month="August";
			}			
			if($r['month']==09)
			{
				$month="September";
			}			
			if($r['month']==10)
			{
				$month="October";
			}			
			if($r['month']==11)
			{
				$month="November";
			}			
			if($r['month']==12)
			{
				$month="December";
			}
			if($r['year']!=NULL)
			{
				$year=$r['year'];
			}
			echo "<span class='glyphicon glyphicon-calendar'></span> <span style='color:blue'>";if($r['role']=="channel"){echo "Created ";}else{echo "Born ";} echo "on:</span> {$day} {$month}";
			if($r['year']!=NULL)
			{
				echo ",".$year;
			}
			echo "<br/>";
		}
	}
	else
	{
		echo "Error:Date of birth could not be captured";
	}
}

function user_friends($user)
{
	global $connection;
	$sql="SELECT following FROM friends WHERE following='{$user}' AND follower='{$_SESSION['username']}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		echo "<button type='button'class='btn btn-primary btn-flat btn-sm'>Follow</button><br/>";
	}
	else
	{
		echo "<button type='button'class='btn btn-danger btn-flat btn-sm'>Unfollow</button><br/>";
	}
}

function channel_creator($user)
{
	global $connection;
	$sql="SELECT creator FROM members WHERE username='{$user}' AND role='channel'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['creator'];
		}
	}
	else
	{
		return "This is not a group";
	}
}

function get_time_joined_group($user,$group)
{
	global $connection;
	$sql="SELECT time1 FROM friends WHERE following='{$user}' AND follower='{$group}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			return $r['time1'];
		}
	}
}

function get_last_two_comments($id)
{
	global $connection;
	$sql="SELECT id,username FROM comments WHERE post_id={$id} GROUP BY username ORDER BY id DESC LIMIT 0,3";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$array = array();
		foreach($query as $r)
		{
			$array[$r['id']]=$r['username'];
		}
		return $array;
	}
	
}

function get_user_pictures($user)
{
	global $connection;
	$sql="SELECT id,username,pic,origin_date FROM feeds WHERE pic IS NOT NULL AND username='{$user}' ORDER BY id DESC";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div style='float:left;padding:10px'>
			<span style='z-index:30000;margin-top:121px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:0px;padding:5px;font-size:13px'>{$r['origin_date']}</span>
			<a href='#'onclick=\"picdialog({$r['id']},'{$r['username']}')\"><img src='uploads/{$r['pic']}'width='150'height='150'alt='{$user} image'/></a>
			</div>";
		}
	}
	else
	{
		echo "<div class='alert alert-warning'>This user has no picture</div>";
	}
}

function get_user_all_videos($user)
{
	global $connection;
	$sql="SELECT id,username,short_clip,origin_date FROM feeds WHERE short_clip IS NOT NULL AND username='{$user}' ORDER BY id DESC";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<div style='float:left;padding:5px'>
			<span style='z-index:30000;margin-top:121px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:0px;padding:5px;font-size:13px'>{$r['origin_date']}</span>
			<video src='uploads/{$r['short_clip']}'width='500'height='300'controls='controls'></video>
			</div>";
		}
	}
	else
	{
		echo "<div class='alert alert-warning'>This user has no video clip</div>";
	}
}
?>