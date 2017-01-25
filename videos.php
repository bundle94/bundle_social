<?php
	require("includes/functions.php");
	require("includes/online_friends.php");
	ob_start();
	/*if(isset($_COOKIE['username']))
	{
		$_SESSION['username']=$_COOKIE['username'];
	}
	else
	{
		header("location:login.php");
	}*/
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
					<a href="social_2.php?user=<?php echo rawurlencode($user);?>&page=1">Go back to <?php echo urlencode($user);?>'s profile</a><br/>
						<?php
							get_user_all_videos($user);
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
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"id="post"></textarea>
            </div>
			<input type="file"name="location"id="image"placeholder="Add an image..."class="form-control"style="display:none"/>
			<input type="text"name="caption"id="caption"placeholder="What do you think about this image..."class="form-control"style="display:none"/>
			<input type="text"name="location"id="location"placeholder="Add your location..."class="form-control"style="display:none"/>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button id="post1" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black"onclick="make_post('<?php echo $_SESSION['username'] ?>')">Post</button>
          <button id="post2" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black;display:none"onclick="make_post_image()">Post</button>
          <button id="post3" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black;display:none"onclick="make_post_video('<?php echo $_SESSION['username'] ?>')">Post</button>
            <ul class="pull-left list-inline"><li><a href="#"id="make_post"><i class="glyphicon glyphicon-upload"></i></a></li><li><a href="#"id="add_image"><i class="glyphicon glyphicon-camera"></i></a></li><li><a href="#"id="add_location"><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="delpost" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:350px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<i class="fa fa-trash"></i> Delete post
      </div>
      <div class="modal-body">
		<h4 style="text-align:center">Sure to delete this post?</h4>
      </div>
      <div class="modal-footer">
          <div>
			<?php echo "<button type='button'class='btn btn-danger btn-flat btn-sm'style='border-bottom:2px solid black'id='delete'>Delete</button>";?>
			<button type="button"class="btn btn-default btn-flat btn-sm"style="border-bottom:2px solid black"id='cancel'>Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="editcom" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:500px">
  <div class="modal-content">
      <div class="modal-header"style="background-color:#bbb">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<i class="fa fa-edit"></i> Edit comment<span class="pull-right"id="edit_com_loader"></span>
      </div>
      <div class="modal-body">
		<textarea class="form-control"id="mycomedit"rows="5"></textarea>
      </div>
      <div class="modal-footer"style="background-color:#bbb">
          <div>
			<?php echo "<span id='update_btn'></span>";?>
			<button type="button"class="btn btn-default btn-flat btn-sm"style="border-bottom:2px solid black"id='cancel'>Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="editpost" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:500px">
  <div class="modal-content">
      <div class="modal-header"style="background-color:#bbb">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<i class="fa fa-edit"></i> Edit post<span class="pull-right"id="edit_post_loader"></span>
      </div>
      <div class="modal-body">
		<textarea class="form-control"id="mypostedit"rows="5"></textarea>
      </div>
      <div class="modal-footer"style="background-color:#bbb">
          <div>
			<?php echo "<span id='update_btn1'></span>";?>
			<button type="button"class="btn btn-default btn-flat btn-sm"style="border-bottom:2px solid black"id='cancel2'>Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="delcom" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:350px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<i class="fa fa-trash"></i> Delete comment
      </div>
      <div class="modal-body">
		<h4 style="text-align:center">Sure to delete this comment?</h4>
      </div>
      <div class="modal-footer">
          <div>
			<button type="button"class="btn btn-danger btn-flat btn-sm"style="border-bottom:2px solid black"id="cont_dele">Delete</button>
			<button type="button"class="btn btn-default btn-flat btn-sm"style="border-bottom:2px solid black"id='cancel1'>Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style="z-index:40000">
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<span class="ion-person"></span> Edit profile<span id="edit_loader"class="pull-right"></span>
      </div>
      <div class="modal-body"id="edit_profile">
		
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-danger btn-flat btn-sm" data-dismiss="modal" aria-hidden="true"style="border-bottom:2px solid black">Cancel</button>
		  <button class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black"onclick="update('<?php echo $_SESSION['username'] ?>')">Update</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
<div id="dp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style="z-index:40000">
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			 <h4><i class="ion-person"></i> Update your profile picture</h4>
      </div>
      <div class="modal-body"><br/>
			<form>
				<input type="file"id="file1"name="file1"class="form-control"/><br/>
				<progress id="progressBar"value="0"max="100"style="width:300px;display:none;margin-left:10px"class="progress progress-success"></progress><h4 id="status"></h4><br/>
				<p id="loaded_n_total"style="margin-left:10px"></p>
				<input type="button"value="Upload picture"onclick="uploadFile()"class="btn btn-primary btn-flat"style="background-color:purple;border-bottom:2px solid black;margin-left:10px"/>
			</form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-danger btn-flat btn-sm" data-dismiss="modal" aria-hidden="true"style="border-bottom:2px solid black">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<div id="overlay"style="visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;text-align:center;z-index:1000;background:rgba(0,0,0,0.7)">
		<div style="width:600px;height:auto;margin:100px auto;background-color:#fff;border:1px solid #fff;padding:5px;text-align:center;border-radius:0px;background-color:white">
			<p class="pull-right"><a href="#"onclick="overlay()"><i class="fa fa-times-circle"></i></a></p><br/>
			<img src="uploads/<?php echo get_profile_photo($_SESSION['username']);?>"width="70"height="70"class="img-circle"/><h3><span class="glyphicon-glyphicon-user"></span>Tell us about yourself</h3>
			<p align="center"id="confirm"></p>
			<p style='color:green;font-size:13px'>Provide your friends and other users with some useful information about you,it might help to locate you</p>
			<textarea id="about"name="about"class="form-control"cols="40"rows="10"placeholder="About youself..."></textarea><br/>
			<p><button type="button"name="submit"class="btn btn-primary form-control"style="border-bottom:2px solid black;background-color:purple"id="submit"onclick="submit()">Submit</button>
		</div>
	</div>	
	<div id="dialog"style="visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:40000;background:rgba(0,0,0,0.7)">
		<div style="width:1050px;height:590px;margin:100px auto;background-color:#fff;border:1px solid #fff;padding:5px;border-radius:0px;min-height:550px">
			<p class="pull-right"><a href="#"onclick="picdialog()"style="background:#606061;color:#FFFFFF;line-height:25px;position:absolute;right:100px;text-align:center;top:90px;width:24px;text-decoration:none;font-weight:bold;border-radius:12px;box-shadow:1px 1px 3px #000">X</a></p><br/>
			<div class='col-md-8'id="paste_img"style="min-height:450px"></div>
			<div class='col-md-4'id="paste_com"></div>
			<div class='col-md-12'id="paste_all"style='margin-top:5px;background-color:#bbb;padding:5px'></div>
		</div>
	</div>
	<div id="view"style="visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:40000;background:rgba(0,0,0,0.7)">
		<div style="width:350px;height:auto;margin:100px auto;padding:5px;min-height:550px;background:#fff;background:linear-gradient(#fff,#999);border-radius:7.5px">
			<a href="#"onclick="view()"style="background:#606061;color:#FFFFFF;line-height:25px;position:absolute;right:450px;text-align:center;top:90px;width:24px;text-decoration:none;font-weight:bold;border-radius:12px;box-shadow:1px 1px 3px #000">X</a>
			<h4 style='text-align:center'><i class="ion-person-stalker"></i> People that likes this post</h4><br/>
			<p id='plikes'style='margin-left:20px'></p>
		</div>
	</div>

	<div id="report"style="visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:40000;background:rgba(0,0,0,0.7)">
		<div style="width:450px;height:auto;margin:100px auto;background-color:#fff;border:1px solid #fff;padding:5px;border-radius:0px;background-color:white;min-height:550px">
			<p class="pull-right"><a href="#"onclick="postrep()"><i class="fa fa-times-circle"></i></a></p><br/>
			<h4 style='text-align:center'><i class='fa fa-pencil-square-o'></i> Please make your report</h4><br/>
			<p style="text-align:center" id="rep_loader"></p>
			<p><input type="radio"name="about"id="about_me"value="about me"/> Is this post about you?<br/>
			<input type="radio"name="about"id="about_fr"value="about friend"/> Is this post about a friend/relation?<br/>
			<input type="radio"name="about"id="other"value="others"/> Others<br/>
			<select id="report_about"class="form-control">
			<option value="">--What report is about--</option>
			<option value="Abuse">Abuse</option>
			<option value="Assult">Assault</option>
			<option value="Heartbreak">Heartbreak</option>
			</select><br/>
			<textarea class="form-control"cols="12"rows="10"id="brief_report"placeholder="Brief us on your case..."></textarea><br/>
			<button type="button"class="btn btn-flat btn-primary"style="border-bottom:2px solid black;background-color:purple"onclick="report(this.value)"id="rep_btn">Report</button>
			</p>
		</div>
	</div>
	<div id="share"style="visibility:hidden;position:absolute;left:0px;top:0px;width:100%;height:100%;z-index:40000;background:rgba(0,0,0,0.7)">
		<div style="width:450px;height:auto;margin:100px auto;background-color:#fff;border:1px solid #fff;padding:5px;border-radius:0px;background-color:white;min-height:550px">
			<p class="pull-right"><a href="#"onclick="share()"><i class="fa fa-times-circle"></i></a></p><br/>
			<h4 style='text-align:center'><i class='fa fa-share'></i> You are about to share this post</h4><br/>
			<p style="text-align:center;max-height:400px;overflow:auto" id="share_loader"></p>
			<p id="paste_btn"></p>
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