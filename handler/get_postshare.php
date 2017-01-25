<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
	}
	
	$sql="SELECT * FROM feeds WHERE id={$id}";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			if($r['post']!=NULL)
			{
				$post="post";
				$p=$r['post'];
				echo $r['post']."<br/>";
			}
			else if($r['pic']!=NULL)
			{
				$p=$r['pic'];
				$post="picture";
				$pic= "../uploads/{$r['pic']}";
				$imagesize=getimagesize($pic);
				$image_width=$imagesize[0];
				$image_height=$imagesize[1];
				if($image_height>$image_width)
				{
					echo "<img src='uploads/{$r['pic']}'width='300'height='350'/>";
				}
				else
				{
					echo "<img src='uploads/{$r['pic']}'width='400'height='250'/>";
				}
			}
			else
			{
				$p=$r['short_clip'];
				$post="video";
				echo "<video src='uploads/{$r['short_clip']}'width='400'height='250'controls='controls'></video><br/>";
			}
			if($r['shared']!=NULL)
			{
				$orig_owner=$r['shared'];
			}
			else
			{
				$orig_owner=$r['username'];
			}
			echo "<input type='text'name='say_something'id='say_something'class='form-control'placeholder='Say something...'/><br/>
			<p id='btns'style='text-align:center'><button type='button'class='btn btn-flat btn-primary'style='border-bottom:2px solid black;background-color:purple'id='share_btn'onclick=\"doshare({$r['id']},'{$orig_owner}','{$post}','{$p}')\">Share</button>
			<button type='button'class='btn btn-flat btn-danger'style='border-bottom:2px solid black'onclick=\"reportd(this.value)\"id='rep_btn'>Cancel</button>";
		}
	}
?>