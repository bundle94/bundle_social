<?php

	require_once("../includes/functions.php");
	
	if(isset($_POST['file']))
	{
		$file=$_POST['file'];
	}
	get_download($file);

?>