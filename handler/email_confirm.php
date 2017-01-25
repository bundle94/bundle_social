<?php
	require_once("../includes/db.inc");
	
	$email=$_POST['email'];
	
	$sql="SELECT email FROM members WHERE email='{$email}'";
	$query=$connection->query($sql);
	if($query->rowCount()==1)
	{
		echo "<div align='center'><h4>You're already a member try signing in</div></h4>";
	}
	else
	{
		echo "<form method='post'action=''>
		<div id='name_msg'></div><br/>
		<input type='text'name='name'placeholder='Your name in full'id='name'class='form-control'/><br/>
		<div id='username_msg'></div><br/>
		<input type='text'name='username'placeholder='Choose a username'id='username'class='form-control'/><br/>
		<div id='email_msg'></div><br/>
		<input type='text'name='email'placeholder='{$email}'id='email1'value='{$email}'class='form-control'disabled/><br/>
		<div id='pass_msg'></div><br/>
		<input type='password'name='pass'placeholder='Choose a password'id='pass'class='form-control'/><br/>
		<div id='pass1_msg'></div><br/>
		<input type='password'name='passw1'placeholder='Re-type password'id='pass1'class='form-control'/><br/>
		<button type='button'id='reg'name='reg'class='btn btn-primary form-control'style='background-color:purple;border-bottom:2px solid black'onclick=\"register()\">Register</button>
		</form>";
	}
?>