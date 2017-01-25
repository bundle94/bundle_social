<?php
	
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
	}
	
	/*$sql_pag="SELECT COUNT(*) FROM comments WHERE post_id='{$id}'";
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
	$sql="SELECT * FROM comments WHERE post_id='{$id}' ORDER BY id DESC";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		echo "<a href='#' onclick=\"set_dp({$id})\"style='font-size:12px'><i class='fa fa-picture-o'></i> Set profile picture</a>";
		echo "<div class='input-group text-center'><input type='text'class='form-control input-sm'placeholder='share your comment...'id='cominput'/>
		<span class='input-group-btn'><button type='button'class='btn btn-primary btn-sm'onclick=\"addcommentdia({$id})\">OK</button></span></div>";
		echo "<p>No comment yet, be the first to comment :)</p>";
		echo "</div>";
	}
	else
	{
			echo "<a href='#' onclick=\"set_dp({$id})\"style='font-size:12px'><i class='fa fa-picture-o'></i> Set profile picture</a>";
			echo "<div class='input-group text-center'><input type='text'class='form-control input-sm'placeholder='share your comment...'id='cominput'/>
			<span class='input-group-btn'><button type='button'class='btn btn-primary btn-sm'onclick=\"addcommentdia({$id})\">OK</button></span></div>";
			echo "</div>";
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<div style='max-height:300px;overflow:auto;font-size:12px'>";
		foreach($query as $r)
		{
			         echo "
                    <div class='direct-chat-msg'>
                      <div class='direct-chat-info clearfix'>
                        <span class='direct-chat-name pull-left'><a href='social_2.php?user={$r['username']}'>".get_user_name($r['username'])."</a></span>
                        <span class='direct-chat-timestamp pull-right'>".get_time_interval_sm($r['date_time'])."</span>
                      </div>
                      <img class='direct-chat-img' src='uploads/".get_profile_photo($r['username'])."'width'30' height='30'alt='message user image' />
                      <div class='direct-chat-text'>".
                        $r['comment']."
						</div>
                      </div>
                    ";	if($_SESSION['username']==$r['username'])
			{
				echo "<a href='#'style='font-size:11px'onclick=\"del_com_dia({$r['id']},{$id})\"><i class='fa fa-trash'style='font-size:11px'></i> Delete</a> <a href='#'style='font-size:11px'onclick=\"edit_com_dia({$r['id']},{$id})\"><i class='fa fa-pencil'style='font-size:11px'></i> Edit</a><br/>";
			}
		}
		echo "</div>";
			/*echo "<div align='center'id='pagindia'>";
			$previous=$page-1;
			$next=$page+1;
			$total_num_pages=ceil($totalpage1/$limit);
			if($total_num_pages>1)
			{
				if($previous>=1)
				{
					echo "<button type='button'class='btn btn_primary btn-sm'onclick=\"pagedia({$previous},{$id})\"id='pagedia'>Newer comments</button><br/><br/>";
				}
				if($next<=$total_num_pages)
				{
					echo "<button type='button'class='btn btn_primary btn-sm'onclick=\"pagedia({$next},{$id})\"id='pagedia'>Older comments</a></button><br/><br/> ";
				}
			}
			echo "</div>";*/
	}
?>