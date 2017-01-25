<?php
  include_once("includes/header.php");

		if(isset($_GET['srch-term']) && !empty($_GET['srch-term']))
		{
				$user = $_GET['srch-term'];
		}
		if(!isset($_GET['srch-term']) || empty($_GET['srch-term']))
		{
			header("location:social_2.php?user={$_SESSION['username']}");
		}
	?>
	<?php
		  echo "<body id='body'style='overflow:hidden;font-family:verdana'>";
	   include_once("includes/menu_side.php");
  ?>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9"style="margin-top:-58px">
					<a href="#" onclick="window.history.back()">Go back </a>
					<br/><br/>
						<?php
              get_search($user);
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
              location.assign("feeds.php");
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