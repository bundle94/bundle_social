<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	
	$id=$_POST['post_id'];
	
	$sql_pag="SELECT COUNT(*) FROM likes WHERE post_id='{$id}'";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=4;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql="SELECT * FROM likes WHERE post_id='{$id}'LIMIT $start, $limit";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		echo "<h4>No likes at the moment</h4>";
			echo "<div align='center'id='pagin'>";
			$previous=$page-1;
			$next=$page+1;
			$total_num_pages=ceil($totalpage1/$limit);
			if($total_num_pages>1)
			{
				if($previous>=1)
				{
					echo "<button type='button'class='btn btn_primary btn-sm'onclick=\"page('#c{$post_id}',{$previous},{$post_id})\">Newer comments</button><br/><br/>";
				}
				if($next<=$total_num_pages)
				{
					echo "<button type='button'class='btn btn_primary btn-sm'onclick=\"page('#c{$post_id}',{$next},{$post_id})\">Older comments</a></button><br/><br/> ";
				}
			}
			echo "</div>";
	}
	else
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<img src='uploads/".get_profile_photo($r['username'])."'width='40'height='40'/> <a href='social_2.php?user={$r['username']}'style='font-size:14px'>".get_user_name($r['username'])."</a><br/>";
			echo "<i class='fa fa-map-marker'style='font-size:14px'></i> <span style='font-size:14px'>".get_location($r['username'])."</span><br/> ";if($r['username']!=$_SESSION['username']){ "<p style='font-size:7px'>".get_num_mutual_friends($r['username'])." </p>";}
			$lsql="SELECT following FROM friends WHERE follower='{$_SESSION['username']}' AND following='{$r['username']}' AND status=1";
			$query1=$connection->query($lsql);
			$query1->setFetchMode(PDO::FETCH_ASSOC);
			if($query1->rowCount()==0)
			{
				if($r['username']==$_SESSION['username'])
				{
					echo "";
				}
				else
				{
					echo "<button type='button'name='follow'class='btn btn-primary btn-flat btn-sm'style='background-color:purple;border-bottom:2px solid black'onclick=\"follow('{$r['username']}',{$id},{$page})\">Follow</button>";
				}
			}
			else{
				foreach($query1 as $f)
				{
					if($r['username']==$_SESSION['username'])
					{
						echo "";
					}
					else if($f['following']==$r['username'])
					{
						echo "<button type='button'name='follow'class='btn btn-danger btn-flat btn-sm'style='border-bottom:2px solid black'onclick=\"unfollow('{$r['username']}',{$id},{$page})\">Unfollow</button>";
					}
					else
					{
						echo "<button type='button'name='follow'class='btn btn-primary btn-flat btn-sm'style='background-color:purple;border-bottom:2px solid black'onclick=\"follow('{$r['username']}',{$id},{$page})\">Followjkkjk</button>"; 

					}
				}
			}
			echo "<hr/>";
		}
			echo "<div align='center'id='lpagin'>";
			$previous=$page-1;
			$next=$page+1;
			$total_num_pages=ceil($totalpage1/$limit);
			if($total_num_pages>1)
			{
				if($previous>=1)
				{
					echo "<button type='button'class='btn btn_primary btn-flat btn-sm'onclick=\"lpage({$previous},{$id})\">Previous</button><br/><br/>";
				}
				if($next<=$total_num_pages)
				{
					echo "<button type='button'class='btn btn_primary btn-flat btn-sm'onclick=\"lpage({$next},{$id})\">Show more</a></button><br/><br/> ";
				}
			}
			echo "</div>";
	}

?>