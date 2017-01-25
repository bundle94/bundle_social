<div id="loading1000"style='display:none'><div id="loader100"><img src="loader/hh.gif"/></div></div>
	<div id="tell"style='display:none;z-index:3000000;margin-top:10px;color:white;position:absolute;background:rgba(0,0,0,0.3);margin-left:600px;padding:5px;border-radius:3px;font-size:17px;font-style:italic'></div>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          
            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
					<img src="uploads/<?php echo get_user_image();?>"height="80"width="80"class="img-circle"/>
                    <?php echo "<li><a href='social_2.php?user={$_SESSION['username']}&page=1'><i class='glyphicon glyphicon-user'></i> My account</a></li>";?>
                    <li><ahref="#"onclick="refresh()"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
					<li class="active"><a href="#"><i class="glyphicon glyphicon-gift"></i> Birthday celebrants <span class="caret"></span></a></li>
					<?php get_birthday(); ?>
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
                    <form class="navbar-form navbar-left" method="get" action="search.php">
                        <div class="input-group input-group-sm" style="max-width:400px;">
                          <input type="text" class="form-control" placeholder="Search people..." name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="feeds.php"id="home"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role='button' data-toggle='modal'id="post_btn"><i class="glyphicon glyphicon-plus"></i> Post</a>
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
								<li><a href="social_2.php?user=<?php echo $_SESSION['username'];?>"><i class="ion-person"></i> My profile</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
								<li class="divider"></li>
								<li><a href="signout.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
							</ul>
						</li>
                    </ul>
                  	</nav>
                </div>