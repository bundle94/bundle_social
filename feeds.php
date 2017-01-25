<?php
  include_once("includes/header.php");
  echo "<body onload=\"getPost1()\"id='body'style='overflow:hidden;font-family:verdana'>";
  include_once("includes/menu_side.php");
?>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                          
                         <!-- main col left --> 
                         <div class="col-sm-5"id="side">
							  <?php
							  if($_SESSION['username'])
							  { 
  								echo "<div class='panel panel-default'style='position:fixed;margin-top:-70px;width:380px'>
                                  <div class='panel-heading'style='background-color:purple;padding:0px;margin-bottom:0px'> <h1 style='text-align:center;font-size:80px;background-color:purple;border:1px solid purple;color:white;margin-top:0px'><i class='ion-ios-people'></i></h1></div>";
                                 	echo "<div style='background-color:#bbb;padding:3px;margin-top:0px;margin-left:0px;color:white'>These are the people you may know,click the refresh button to refresh the list</div><br/>";
  								echo "<div class='panel-body'id='people'>";
                                  	get_people();                       
  								echo"</div>
                                </div>";
							  }
							  ?>
							  <?php
							  
							  	echo "<div class='box box-danger direct-chat direct-chat-primary'style='display:none;z-index:100000;position:fixed;margin-left:800px;margin-top:390px;width:300px'id='my_chat'>
								  <div class='box-header with-border'>
									<h5 class='box-title'id='receiver'></h5>
									<div class='box-tools pull-right'>
									  <button class='btn btn-box-tool' data-widget='collapse'onclick=\"minimise_chat()\"><i class='fa fa-minus'></i></button>
									  <button class='btn btn-box-tool' data-toggle='tooltip' title='Close'id='close1'onclick=\"close_chat()\"><i class='fa fa-times'></i></button>
									</div>
								  </div>
								  <div class='box-body'id='chat_body'>";
								  echo "<div class='direct-chat-messages'id='paste_chat'>";
								  
								  
								  echo "</div>
									</div>
									  <div class='box-footer'>
										<div class='input-group'>
										  <input type='text' name='message' placeholder='Type Message ...' class='form-control'id='message'/>
										  <span class='input-group-btn'>
											<button type='button' class='btn btn-primary btn-flat'id='msg_send'onclick=\"send_message(this.value)\">Send</button>
										  </span>
										</div>
									  </div>
									 </div>";
							  
							  ?>
                           
                          </div>
                          
                          <!-- main col right -->
                          
                          <div class="col-sm-7"id="posts"onload="loadpost(<?php echo $user;?>)"style="margin-left:0px;margin-top:-70px">
							
                          
                        </div>
                       </div><!--/row-->  
                      
                      <hr>
                      
                      <h5 class="text-center">
                        <a href="" target="ext">Bundle | social media</a>
                      </h5>
                      <hr/>
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->

          
        </div>
    </div>
</div>



<!--post modal-->
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
        			<input type="file"name="image"id="image"placeholder="Add an image..."class="form-control"style="display:none"/>
        			<input type="text"name="pic_caption"id="pic_caption"placeholder="What do you think about this image?"class="form-control"style="display:none"/>
              <input type="file"name="video"id="video"placeholder="Add a video clip..."class="form-control"style="display:none"/>
              <input type="text"name="clip_caption"id="clip_caption"placeholder="What do you think about this video clip?"class="form-control"style="display:none"/>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button id="post1" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black"onclick="make_post('<?php echo $_SESSION['username'] ?>')">Post</button>
          <button id="post2" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black;display:none"onclick="make_post_image()">Post</button>
          <button id="post3" class="btn btn-primary btn-flat btn-sm"style="background-color:purple;border-bottom:2px solid black;display:none"onclick="make_post_video()">Post</button>
            <ul class="pull-left list-inline"><li><a href="#"id="make_post"><i class="glyphicon glyphicon-upload"></i></a></li><li><a href="#"id="add_image"><i class="glyphicon glyphicon-camera"></i></a></li><li><a href="#"id="add_video"><i class="glyphicon glyphicon-play"></i></a></li></ul>
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
<div id="emptypost" class="modal" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:350px;margin-top:250px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<i class="fa fa-times"></i> Warning
      </div>
      <div class="modal-body">
		<h4 style="margin-left:10px">Please write something,the post field cannot be empty</h4>
      </div>
      <div class="modal-footer">
          <div>
			<button type="button"class="btn btn-danger btn-flat btn-sm"style="border-bottom:2px solid black" data-dismiss="modal" aria-hidden="true">Ok</button>
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
  <div id="set_dp" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"style='z-index:50000'>
  <div class="modal-dialog"style="border:3px solid purple;border-radius:5px;width:350px">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <i class="fa fa-picture-o"></i> Set as profile picture<span class="pull-right"id="dp_loader"></span>
      </div>
      <div class="modal-body">
    <p style="text-align:center">You are about to set this picture as your profile picture,do you wish to continue?</p>
      </div>
      <div class="modal-footer">
          <div>
      <button type="button"class="btn btn-danger btn-flat btn-sm"style="border-bottom:2px solid black"id="cont_dp">Continue</button>
      <button type="button"class="btn btn-default btn-flat btn-sm"style="border-bottom:2px solid black"id='cancel_dp' onclick="$('#set_dp').modal('hide')">Cancel</button>
      </div>  
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="myscript.js"></script>
		<script>
			function make_post(user)
			{
        //This is the function for creating a write up post
				var my_post = $('#post').val();
				if(my_post=="")
				{
					$('#postModal').modal('hide');
					$('#emptypost').modal('show');
				}
				else
				{
					$.post("handler/make_post.php",{post:my_post},function(response){
						if(response=="success")
						{
							$('#postModal').modal("hide");
							$('#tell').html("You've shared a post :)").fadeIn('slow').delay(4000).fadeOut();
							location.reload(true);
						}
						else
						{
							$('#tell').html("Post couldn't be shared !!").fadeIn('slow').delay(4000).fadeOut();
						}
					});
				}
			}
		</script>
	<?php echo "</body>";?>
</html>
<?php ob_end_flush(); ?>