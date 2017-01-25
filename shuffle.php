<?php

	require_once("includes/db.inc");
	
	$sql="SELECT username FROM members ORDER BY RAND()";
	$query=$connection->query($sql);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	foreach($query as $r)
	{
		echo $r['username']."<br/>";
	}

?>