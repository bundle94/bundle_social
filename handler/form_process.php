<?php

	sleep(7);
	
	echo $_POST['firstname']."<br/>";
	echo $_POST['surname']."<br/>";
	echo $_POST['lastname']."<br/>";
	echo $_POST['email']."<br/>";
	echo $_POST['phone'];
	echo $target_file2=basename($_FILES['file1']['name'])."<br/>";
	echo $_POST['discipline']."<br/>";

?>