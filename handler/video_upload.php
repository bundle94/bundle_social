<?php
require_once("../includes/db.inc");
require_once("../includes/functions.php");

	$caption = sanitize($_POST['clip_caption']);
	$tmp_file2=$_FILES['video']['tmp_name'];
	$target_file2=basename($_FILES['video']['name']);
	$size=$_FILES['video']['size'];
	$type=$_FILES['video']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	if($extension=="3gp" || $extension=="mp4" || $extension=="avi" && $type=="image/jpeg" && $size<=11000000){
		$upload_dir2="../uploads";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$target_file2);
		$time1 = date("Y-m-d H:i:s");
		$sql="INSERT INTO feeds (username,short_clip,clip_caption,date_time,origin_date) VALUE ('{$_SESSION['username']}','{$target_file2}','{$caption}','{$time1}','{$time1}')";
		$query = $connection->query($sql);
		if($query){
			echo "success";
		}
	}
	else{
		echo "error";
	}
?>