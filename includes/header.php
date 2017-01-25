<?php
	require("functions.php");
	require("online_friends.php");
	ob_start();
  if(!isset($_SESSION['username']))
  {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>bundle-social media</title>
		<meta name="generator" content="Bundle" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/AdminLTE.min.css" rel="stylesheet">
		<link href="css/ionicons.min.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<style type="text/css">
		#loading1000 {background:rgba(255,255,255,0.7);height:1600px;width:100%;z-index:5000;top:0px;position:fixed;opacity:1;left:0px}
		#loader100 {color:black;margin:300px auto;width:80px;height:24px}
		</style>
	</head>
	