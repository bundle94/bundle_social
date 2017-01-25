<?php

	require_once("../includes/db.inc");
	require_once("../includes/functions.php");
	
	$email1=$_POST['email1'];
	$name=sanitize($_POST['name']);
	$username=sanitize($_POST['username']);
	$password=sanitize($_POST['pass']);
	
	$sql="INSERT INTO members (name,username,email,password,photo) VALUES ('{$name}','{$username}','{$email1}','{$password}','avatar.png')";
	$query=$connection->query($sql);
	if($query)
	{
		$_SESSION['username']=$username;
		echo "<h4> This will help get You started</h4><br/>
		<span style='font-size:13px'>The avatar logo will be used as your profile picture,This will change once your profile is updated</span><br/>
		<span style='font-size:13px'>* all fields are required,if you want to update your account</span>
		<img src='uploads/".get_profile_photo($username)."'width='40'height='40'class='img-circle pull-right'/>";
		echo "<form method='post'action=''>
		<input type='text'name='name'placeholder='Your city or location'id='city'class='form-control'/><br/>
		<input type='text'name='phone'placeholder='Enter your phone number'id='phone'class='form-control'/><br/>
		<label>Date of birth</label><br/>
		<select id='day'>
		<option value=''>--Select day--</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
		<option value='6'>6</option>
		<option value='7'>7</option>
		<option value='8'>8</option>
		<option value='9'>9</option>
		</select>
		<select id='month'>
		<option value=''>--Select month--</option>
		<option value='January'>January</option>
		<option value='February'>February</option>
		<option value='March'>March</option>
		<option value='April'>April</option>
		<option value='May'>May</option>
		<option value='June'>June</option>
		<option value='July'>July</option>
		<option value='August'>August</option>
		<option value='September'>September</option>
		<option value='October'>October</option>
		<option value='November'>November</option>
		<option value='December'>December</option>
		</select>
		<select id='year'>
		<option value=''>--Select day--</option>
		<option value='1'>2016</option>
		<option value='2'>2015</option>
		<option value='3'>2014</option>
		<option value='4'>2013</option>
		<option value='5'>2012</option>
		<option value='6'>2011</option>
		<option value='7'>2010</option>
		<option value='8'>2009</option>
		<option value='9'>2008</option>
		</select><br/>
		<label>Add profile picture</label><br/>
		<input type='file'class='form-control'name='profile_pic'id='profile_pic'/><br/>
		<label>Add cover picture</label>
		<input type='file'name='cover_pic'id='cover_pic'class='form-control'/><br/>
		<button type='button'id='reg'name='reg'class='btn btn-primary'style='background-color:purple;border-bottom:2px solid black'onclick=\"update()\">Update my account</button>
				<button type='button'id='reg'name='reg'class='btn btn-danger'style='border-bottom:2px solid black'onclick=\"skip('{$_SESSION['username']}')\">Skip</button>
		</form>";
	}
	else
	{
	
	}

?>