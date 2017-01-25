<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$post_id=$_POST['post_id'];
	
	/*$sql_pag="SELECT COUNT(*) FROM comments WHERE post_id='{$post_id}'";
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
	} LIMIT $start, $limit*/
	$sql="SELECT * FROM comments WHERE post_id='{$post_id}' ORDER BY id DESC";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		echo "<span style='font-size:13px'>No comment yet,be the first to comment</span>";
	}
	else
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		/*{
			echo "<span class='pull-right'style='color:gray;font-size:11px'><i class='fa fa-clock-o'style='font-size:12px'></i> ".get_time_interval($r['date_time'])."</span>";
			echo"<img src='uploads/".get_profile_photo($r['username'])."'width='30'height='30'style='border-radius:50%'/><span style='font-size:11px'> <a href='social_2.php?user={$r['username']}'><b>".get_user_name($r['username'])."</b></a><br/>".$r['comment']."</span><br/>";
			if($_SESSION['username']==$r['username'])
			{
				echo "<a href='#'style='font-size:11px'><i class='fa fa-trash'style='font-size:11px'></i> Delete</a> <a href='#'style='font-size:11px'><i class='fa fa-pencil'style='font-size:11px'></i> Edit</a><br/>";
			}
		}*/
		{
			         echo "
                    <div class='direct-chat-msg'>
                      <div class='direct-chat-info clearfix'>
                        <span class='direct-chat-name pull-left'style='font-size:11px'><a href='social_2.php?user={$r['username']}'>".get_user_name($r['username'])."</a></span>
                        <span class='direct-chat-timestamp pull-right'>".get_time_interval_sm($r['date_time'])."</span>
                      </div>
                      <img class='direct-chat-img' src='uploads/".get_profile_photo($r['username'])."'width'30' height='30'alt='message user image' />
                      <div class='direct-chat-text'><span style='font-size:12px'>".
                        $r['comment']."</span>
						</div>
                      </div>
                    ";	
					if($_SESSION['username']==$r['username'])
					{
						echo "<a href='#'style='font-size:11px'onclick=\"delcom_prof({$r['id']},{$post_id},'#c{$post_id}')\"><i class='fa fa-trash'style='font-size:11px'></i> Delete</a> <a href='#'style='font-size:11px'onclick=\"edit_com({$r['id']},{$post_id},'#c{$post_id}')\"><i class='fa fa-pencil'style='font-size:11px'></i> Edit</a><br/>";
					}
		}
			/*echo "<div align='center'id='pagin'>";
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
			echo "</div>";*/
	}

?>