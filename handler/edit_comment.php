<?php
	header('Content-type: application/json');
	require_once("../includes/db.inc");
	//require_once("../includes/functions.php");
	
	$id=$_POST['id'];
	
	$sql="SELECT post_id,comment FROM comments WHERE id='{$id}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			$reply=array('success'=>'yes','message'=>$r['comment'],'id'=>"<button type='button'class='btn btn-danger btn-flat btn-sm'style='border-bottom:2px solid black'id='update_com'onclick=\"update_com({$id},{$r['post_id']},'#c{$r['post_id']}')\">Update</button>");
			echo json_encode($reply);
			//echo $r['comment'];
		}
	}
	else
	{
		$reply=array('success'=>'yes','message'=>'Error fetching your comment');
		echo json_encode($reply);
		//echo "An error occured";
	}



?>