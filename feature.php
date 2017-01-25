<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/ionicons.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
		var firstname,surname,lastname,email,phone,password,image,discipline;
		function _(x) {
			return document.getElementById(x);
		}
		function processphase1() {
			surname=_("surname").value;
			firstname=_("firstname").value;
			lastname=_("lastname").value;
			if(surname.length>2 && firstname.length>2 && lastname.length>2) {
				_("phase1").style.display="none";
				_("phase2").style.display="block";
				_("progressbar").value="50";
				_("phase").innerHTML="Stage 2 of 3";
			}
			else
			{
				alert("Please kindly fill the form to proceed")
			}
		}
		function processphase2() {
			email=_("email").value;
			phone=_("phone").value;
			if(email.length>2 && phone.length>2) {
				_("phase2").style.display="none";
				_("phase3").style.display="block";
				_("progressbar").value="100";
				_("phase").innerHTML="Stage 3 of 3";
			}
			else
			{
				alert("Please kindly fill the form to proceed")
			}
		}
		function PreviewFile() {
			var preview=document.querySelector('img');
			var file=document.querySelector('input[type=file]').files[0];
			var reader= new FileReader();
			reader.onloadend=function() {
				preview.src=reader.result;
			}
			if(file) {
				reader.readAsDataURL(file);
			}
			else {
				preview.src="";
			}
		}
	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"style="background-color:green;border:1px solid green">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"style="color:white">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"style="border-bottom:2px solid black">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
			<div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button"class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<p class="modal-title" id="myModalLabel"style="font-size:20px"><span class="ion-person-add"data-pack="default"data-tags="talk"></span> Register</p><div align="center"id="loader"></div>	
						</div>
						<div class="modal-body">
							<progress id="progressbar"value="0"max="100"class="progress progress-success"></progress>
							<progress id="progressBar"value="0"max="100"class="progress progress-success"style="display:none"></progress>
							<span id="phase"class="pull-right">Stage 1 of 3</span>
							<form id="register4"method="post"enctype="multipart/form-data">
								<div id ="phase1">
									<h4>Personal Details</h4>
									<input type="text"name="surname"id="surname"placeholder="Sur Name"class="form-control"/><br/>
									<input type="text"name="firstname"id="firstname"placeholder="First Name"class="form-control"/><br/>
									<input type="text"name="lastname"id="lastname"placeholder="Last Name"class="form-control"/><br/>
									<button type="button"class="btn btn-primary"name="proceed"id="proceed1"style="border-bottom:2px solid black"onclick="processphase1()">Continue</button>
								</div>
								<div id ="phase2"style="display:none">
									<h4>Contact Details</h4>
									<input type="text"name="email"id="email"placeholder="Email"class="form-control"/><br/>
									<input type="text"name="phone"id="phone"placeholder="Phone Number"class="form-control"/><br/>
									<button type="button"class="btn btn-primary"name="proceed2"id="proceed"style="border-bottom:2px solid black"onclick="processphase2()">Continue</button>
								</div>
								<div id ="phase3"style="display:none">
									<h4>Round Up Stage</h4>
									<b>Choose your discipline</b><br/>
									<select id="discipline"name="discipline"class="form-control">
										<option value="">--Select discipline--</option>
										<option value="pre-art">Pre-Art</option>
										<option value="pre-science">Pre-Science</option>
									</select><br/>
									<input type="password"name="password"id="password"placeholder="Password"class="form-control"/><br/>
									<input type="password"name="password2"id="password2"placeholder="Re-type Password"class="form-control"/><br/>
									<input type="file"name="file1"id="file1"class="form-control"onchange="PreviewFile()"/><br/>
									<span style="margin-left:25px"><img style="border:1px solid gray;padding:4px"src="uploads/avatar.png"height="100"width="100"alt="image preview"/></span><br/><br/>
									<button type="submit"class="btn btn-primary"name="proceed"id="proceed3"style="border-bottom:2px solid black">Submit form</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							  <button type="button"class="btn btn-default" data-dismiss="modal"style="border-bottom:2px solid black">Cancel</button>
						</div>
					</div>
				</div>
			</div>
    <div class="jumbotron"style="background-image:url(images/highschool_2.png);height:400px">
      <div class="container"style="color:white">
		<div class="pull-right">
        <h1 id="load">MOUAU EXAM PORTAL</h1>
        <p>Welcome to MOUAU Pre-Degree CBT Portal</p>
        <p><a class="btn btn-primary btn-lg" id="click"role="button"style="border-bottom:2px solid black">Register Now &raquo;</a></p>
		</div>
	  </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div>

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#click').click(function(){
				$('#confirm').modal('show');
			});
			$('#register4').submit(function(e){
			e.preventDefault();
			//_("progressBar").style.display="block";
			var file=_("file1").files[0];
			//alert(file.name+"|"+file.size+"|"+file.type);
			if(file.size<=2000000 && file.type=="image/jpeg")
			{
				var formdata=new FormData(this);
				//formdata.append("file1",file);
				var ajax=new XMLHttpRequest();
				ajax.upload.addEventListener("progress",progressHandler,false);
				ajax.addEventListener("load",completeHandler,false);
				ajax.addEventListener("error",errorHandler,false);
				ajax.addEventListener("abort",abortHandler,false);
				ajax.open("POST","handler/form_process.php");
				ajax.send(formdata);
				_("progressbar").style.display="none";
				_("progressBar").style.display="block";
			}
			else
			{
				_("phase").innerHTML="Image must be jpeg and less than 2MB";
			}
		})
			function progressHandler(event)
	{
		//_("loaded_n_total").innerHTML="Uploaded"+event.loaded+"bytes of"+event.total;
		var percent=(event.loaded/event.total)*100;
		_("progressBar").value=Math.round(percent);
		//_("progressBar").innerHTML="<img src='loader/loading.gif'/>";
		_("phase").innerHTML=Math.round(percent)+"% uploaded...please wait";
	}
			function completeHandler(event)
			{
				_("phase").innerHTML=event.target.responseText;
				/*_("status").innerHTML=event.target.responseText;*/
				_("progressBar").value=0;
				_("progressBar").style.display="none";
			}
				function errorHandler(event)
	{
		_("phase").innerHTML="Upload failed";
	}
	function abortHandler(event)
	{
		_("phase").innerHTML="Upload aborted"
	}
		});
	</script>
  </body>
</html>
