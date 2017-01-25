<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>login/Register page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="css/styles.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
		#loading1 {background:rgba(255,255,255,0.7);height:1600px;width:100%;z-index:5000;top:0px;position:fixed;opacity:1;left:0px}
		#loader {color:black;margin:300px auto;width:80px;height:24px}
		#overlay{
			visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;text-align:center;z-index:1000;background:rgba(255, 255, 255, 0.27);background-image: initial;
			background-position-x: initial;
			background-position-y: initial;
			background-size: initial;
			background-repeat-x: initial;
			background-repeat-y: initial;
			background-attachment: initial;
			background-origin: initial;
			background-clip: initial;
			background-color: rgba(0, 0, 0, 0.5);
		}
		#overlay div{
			width:600px;height:auto;margin:100px auto;background-color:#fff;border:1px solid #fff;padding:5px;text-align:center;border-radius:0px;background-color:#dddddd;box-shadow:3px 3px 2px gray;border-radius:5px
		}
		.close{
			background-color:blue;padding:5px;
		}
		#footer {background:rgba(0,0,0,0.3);z-index:3000;margin-top:372px;padding:13px;color:#fff;font-size:13px}
	</style>
  </head>

  <body style="background-image:url(images/bg.png)">
			<div id="loading1"style='display:none'><div id="loader"><img src="loader/hh.gif"/></div></div>

    <div class="container">
		<div>
		  <form class="form-signin" role="form">
			<h2 class="form-signin-heading"style="text-align:center">Please sign in</h2>
			<input type="email" class="form-control" placeholder="Email address"id="email" required autofocus>
			<input type="password" class="form-control" placeholder="Password"id="password" required>
			<label class="checkbox">
			  <input type="checkbox" value="remember-me"id="rem"name="rem"> Remember me
			</label>
			<button class="btn btn-lg btn-primary btn-block" id="login"type="button"style="background-color:purple;border:1px solid purple;border-bottom:2px solid black">Sign in</button>
		  </form>
		  <div align="center"style="font-size:13px"><a href="#"id="signup">Sign up</a> | <a href="#"id="forgot"onclick="overlay()">Forgot password?</a></div>
			<div align="center"id="loader1"></div>
		</div>
    </div>

<div id="register" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4><span class="glyphicon glyphicon-user"></span> Become a member</h4>
			<div align='right'id='regis_loader'></div>
      </div>
      <div class="modal-body">
	  <div id="loading">
          <form class="form center-block">
            <div class="form-group">
			  <div id="error"></div>
              <input type="email"name="reg_email"id="reg_email"class="form-control"placeholder="Input your email"/>
			 </div>
		  </form>
	    <div>
          <button type="submit"class="btn btn-primary btn-sm form-control"style="background-color:purple;border-bottom:2px solid black"id="go">Proceed</button>
		 </div>
	  </div>
      <div class="modal-footer">	
      </div>
  </div>
  </div>
</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#reg_email').keyup(function(event){
				if(event.keyCode==13)
				{
					$('#go').click();
				}
				if(event.keyCode==27)
				{
					$('#register').modal('hide');
				}
			})
			$('#go').click(function(){
				var email_reg=$('#reg_email').val();
				if($('#reg_email').val()=="")
				{
					$('#error').html("<div align='center'style='color:red'class='alert alert-danger'>Kindly input your email</div>");
				}
				else
				{
					$('#loading').html("<div align='center'><img src='loader/loader.gif'/><br/>checking...</div>");
					$.post("handler/email_confirm.php",{email:email_reg},function(response){
						$('#loading').html(response);
					});
				}
			})
			$('#signup').click(function(){
				$('#register').modal('show');
			})
			$('#password').keyup(function(e){
				if(e.keyCode==13){
					$('#login').click();
				}
			})
			$('#login').click(function(){
				var email=$('#email').val();
				var password=$('#password').val();
				var rem = $('input:checkbox[name=rem]:checked').val();
				if(email=="" || password==""){
					$('#loader1').html("<div class='alert alert-danger'style='width:400px'>Your username/password must not be empty</div>");
				}
				else{
					var loader = document.getElementById("loading1");
					loader.style.display="block";
					$.post("handler/login.php",{email:email,password:password,rem:rem},function(response){
						if(response==1){
							loader.style.display="none";
							$('#loader1').html("<div class='alert alert-danger'style='width:400px'>Incorrect username and password combination</div>");
						}
						else{
							//$('#loader').html(response);
							location.replace("feeds.php");
							//alert(response);

						}
					})
				}
			})
		})
		function overlay(){
			el=document.getElementById("overlay");
			el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
		}
		function register()
		{
			var name = $('#name').val();
			var username = $('#username').val();
			//var email = $('#email').val();
			var pass = $('#pass').val();
			var pass1 = $('#pass1').val();
			if(name=="" || username=="" || pass=="" || pass1=="")
			{
				if(name=="")
				{
					$('#name_msg').html("<div style='color:red;font-size:13px'> Your name is required</div>");
				}
				if(username=="")
				{
					$('#username_msg').html("<div style='color:red;font-size:13px'> Choose a username</div>");
				}
				if(pass=="")
				{
					$('#pass_msg').html("<div style='color:red;font-size:13px'> Choose a password</div>");
				}
				if(pass1=="")
				{
					$('#pass1_msg').html("<div style='color:red;font-size:13px'> Kindly retype password</div>");
				}
			}
			else
			{
				$('#email1').prop('disabled',false);
				var email1 = $('#email1').val();
				//alert(email1);
				$('#regis_loader').html("<img src='loader/loading.gif'/>");
				$.post("handler/register_user.php",{name:name,username:username,email1:email1,pass:pass},function(response){
					$('#regis_loader').html("");
					$('#loading').html(response);
				});
			}
		}
		function skip(username)
		{
			location.replace("social_2.php?user="+username);
		}
</script>
  </body>
</html>
