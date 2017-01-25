<?php
	require("includes/functions.php");
	require("includes/online_friends.php");
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
	</head>
	<?php
		if(isset($_GET['user']) && !empty($_GET['user']))
		{
			if(!empty($_GET['user']))
			{
				if(get_user_exist($_GET['user']))
				{
					$user = $_GET['user'];
				}
				else
				{
					die("<h2>The page you requested for was not found</h2>");
				}
			}
		}
		if(!isset($_GET['user']) || empty($_GET['user']))
		{
			header("location:social_2.php?user={$_SESSION['username']}");
		}
	?>
	<?php
		echo "<body onload=\"getconnect('{$user}')\"id='body'style='overflow:hidden;font-family:verdana'>";
	?>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          
            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
					<img src="uploads/<?php echo get_user_image();?>"height="60"width="60"class="img-circle"/>
                    <li class="active"><a href="#featured"><i class="glyphicon glyphicon-list-alt"></i> Featured</a></li>
                    <?php echo "<li><a href='social_2.php?user={$_SESSION['username']}&page=1'><i class='glyphicon glyphicon-user'></i> My account</a></li>";?>
                    <li><a href="#"onclick="refresh()"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
                    <li><a href="#"id='h_s_online'><i class="ion-person-stalker"></i> Online friends(<?php echo get_num_online_friends(); ?>) <span class="caret"></span></a></li>
					<?php show_friends(); ?>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                </ul>
              
              	<!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">
                  	<li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
                  	<li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                </ul>
              
            </div>
            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top"style="background-color:purple;z-index:40000">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="/" class="navbar-brand logo">b</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"id="home"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
					  <li class="dropdown messages-menu">
                        <a href="#"id="notification"class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-bell"></i> <?php echo "<span class='label label-success'id='paste_num_msg_main'>".get_inbox()."</span>";?> Notification</a>
					<ul class="dropdown-menu">
                  <li class="header">You have <?php echo "<span id='paste_num_msg'>".get_inbox()."</span>";?> Notifications</li>
                  <li>
                    <ul class="menu"id="notifs">
						<?php get_notifications(); ?>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
					  <li class="dropdown messages-menu">
                        <a href="#"id="home"class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-inbox"></i> <?php echo "<span class='label label-success'id='paste_num_msg_main'>".get_inbox()."</span>";?> Inbox</a>
					<ul class="dropdown-menu">
                  <li class="header">You have <?php echo "<span id='paste_num_msg'>".get_inbox()."</span>";?> messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu"id="paste_msg_inbox">
						<?php get_msg_inbox();?>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right"style="margin-right:20px">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"style="color:white"><span class="ion-person"></span> <?php echo get_user_email();?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="social_2.php?user=<?php echo $_SESSION['username'];?>">My profile</a></li>
								<li><a href="#">Settings</a></li>
								<li class="divider"></li>
								<li><a href="signout.php">Sign out</a></li>
							</ul>
						</li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9"style="margin-top:-58px">
					<a href="social_2.php?user=<?php echo rawurlencode($user);?>&page=1">Go back to <?php echo urlencode($user);?>'s profile</a> <?php echo "<button type='button'class='btn btn-default btn-flat btn-lg'onclick=\"show_follower()\"id='btn_follower'>Followers</button>";?>
					<?php echo "<button type='button'class='btn btn-default btn-flat btn-lg'onclick=\"show_following('{$user}')\"id='btn_following'>Following</button>";?>
					<br/><br/>
						<?php
							echo "<div id='follower'>";

							echo "</div><br/>";
							echo "<div id='following'style='display:none'>";
								
							echo "</div><br/>";
						?>
							
                    </div>
                </div><!--/row-->
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div>
                      
                        <div class="row" id="footer"style="margin-top:-20px">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
							<?php $time = time();?>
                            <a href="#" class="pull-right">©Copyright <?php echo strftime("%Y",$time);?></a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h5 class="text-center">
                      <a href="" target="ext">Bundle | social media</a>
                      </h5>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


	<!-- script references -->
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="myscript.js"></script>
	<?php echo "</body>";?>
</html>
<?php ob_end_flush(); ?>