<?php
	header("Content-type: image/jpeg");
	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
	}
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
	}
	
	$prev=get_prev_id($id,$username);
	$next=get_next_id($id,$username);
	$sql="SELECT id,username,pic,pic_caption FROM feeds WHERE id={$id} AND username='{$username}'";
	$query=$connection->query($sql);
	if($query->rowCount()==0)
	{
		echo "<h4>Post no longer exists </h4>";
	}
	else
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			//echo $prev;
			//echo $next;
			echo "<span style='width:690px;text-align:center;padding:5px;margin-top:0px;margin-left:0px;z-index:40000;position:absolute;background:rgba(0,0,0,0.5);color:white;font-size:14px'>{$r['pic_caption']}</span>";
			echo "<a href='#' id='next'style='padding:5px;margin-top:200px;margin-left:640px;border:1px solid gray;z-index:40000;position:absolute;background:rgba(0,0,0,0.4);color:white;opacity:0.3;font-size:30px'onclick=\"dialogpagn({$next},'{$r['username']}')\"class='glyphicon glyphicon-chevron-right'></a>
			<a href='#' id='prev'style='padding:5px;margin-top:200px;margin-left:8px;border:1px solid gray;z-index:40000;position:absolute;background:rgba(0,0,0,0.4);color:white;opacity:0.3;font-size:30px'onclick=\"dialogpagp({$prev},'{$r['username']}')\"class='glyphicon glyphicon-chevron-left'></a>";
				$pic= "../uploads/{$r['pic']}";
				
				$imagesize=getimagesize($pic);
				$image_width=$imagesize[0];
				$image_height=$imagesize[1];
				if($image_height>$image_width)
				{
					echo "<img src='uploads/{$r['pic']}'width='400'height='450'style='margin-left:140px'/>";
				}
				else
				{
					echo "<img src='uploads/{$r['pic']}'width='690'height='450'/>";
				}

		}
	}
?>
	<script>
		$('#next').hover(function(){
			$(this).css({"opacity":"1"});
		})
		$('#next').mouseout(function(){
			$(this).css({"opacity":"0.3"});
		})
		$('#prev').hover(function(){
			$(this).css({"opacity":"1"});
		})
		$('#prev').mouseout(function(){
			$(this).css({"opacity":"0.3"});
		})
	</script>
