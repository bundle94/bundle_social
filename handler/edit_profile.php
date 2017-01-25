<?php
	require_once("../includes/db.inc");
	
	sleep(1);
	$username=$_POST['username'];
	
	$sql="SELECT * FROM members WHERE username='{$username}'";
	$query=$connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			echo "<h4>Personal Details</h4>";
			echo "<label>Name</label>";
			echo "<input type='text'placeholder='{$r['name']}'value='{$r['name']}'id='name'class='form-control'/><br/>";
			echo "<label>E-mail</label>";
			echo "<input type='email'placeholder='{$r['email']}'value='{$r['email']}'id='email'class='form-control'/><br/>";
			echo "<label>Phone number</label>";
			echo "<input type='text'placeholder='{$r['phone_number']}'value='{$r['phone_number']}'id='phone_number'class='form-control'/><br/>";
			echo "<label>Location</label>";
			echo "<input type='text'placeholder='{$r['location1']}'value='{$r['location1']}'id='location1'class='form-control'/><br/>";
			echo "<h4>Academic Details</h4>";
			echo "<label>High school</label>";
			echo "<input type='text'placeholder='{$r['high_school']}'value='{$r['high_school']}'id='high_school'class='form-control'/><br/>";
			echo "<label>College</label>";
			echo "<input type='text'placeholder='{$r['college']}'value='{$r['college']}'id='college'class='form-control'/><br/>";
			//echo "<input type='text'placeholder='{$r['name']}'value='{$r['name']}'class='form-control'/><br/>";
		}
	}
	else
	{
		echo "<h4 style='text-align:center'>We had problem fetching your profile</h4>";
	}
?>