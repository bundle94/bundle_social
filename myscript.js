	$('#body').scroll(function(){
		//if($(window).scrollTop()==$(document).height()-$(window).innerheight()){
			alert("youv'e reached the bottom of the page");
			$('#btnclick').click();
		//}
		});
			function getPost1()
			{
				$('#posts').html("<div align='center'style='margin-top:250px'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading friends posts...</span></div>");
				$.get("handler/loadfeeds.php?page=1",function(response){
					$('#posts').html(response);
					$('.com').click();
				});
			}
			function paginate1(page)
			{
				$('#paginate1').remove();
				$('#posts').append("<div align='center'class='load'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading...</span></div>");
				$.get("handler/loadfpost.php?page="+page,function(response){
					$('.load').remove();
					$('#posts').append(response);
					$('.com').click();
				});
			}
			function getPost(user)
			{
				$('#posts').html("<div align='center'style='margin-top:250px'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading user posts...</span></div>");
				$.get("handler/loadpost.php?user="+user+"&page=1",function(response){
					$('#posts').html(response);
					$('.com').click();
				});
			}
			function paginate(user,page)
			{
				$('#paginate1').remove();
				$('#posts').append("<div align='center'class='load'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading...</span></div>");
				$.get("handler/loadpost.php?user="+user+"&page="+page,function(response){
					$('.load').remove();
					$('#posts').append(response);
					$('.com').click();
				});
			}
			$(document).ready(function(){
				$('#add_location').click(function(){
					$('#location').toggle('fast');
				})
				$('#add_image').click(function(){
					$('#image').show('fast');
					$('#pic_caption').show('fast');
					$('#post2').show('fast');
					$('#post').hide('fast');
					$('#post1').hide('fast');
					$('#video').hide('fast');
					$('#clip_caption').hide('fast');
					$('#post3').hide('fast');
				})
				$('#make_post').click(function(){
					$('#image').hide('fast');
					$('#pic_caption').hide('fast');
					$('#post1').show('fast');
					$('#post').show('fast');
					$('#post2').hide('fast');
					$('#video').hide('fast');
					$('#clip_caption').hide('fast');
					$('#post3').hide('fast');
				})
				$('#add_video').click(function(){
					$('#image').hide('fast');
					$('#pic_caption').hide('fast');
					$('#post1').hide('fast');
					$('#post').hide('fast');
					$('#post2').hide('fast');
					$('#video').show('fast');
					$('#clip_caption').show('fast');
					$('#post3').show('fast');
				})
				/*$('#notification').click(function(){
					$('#notifs').html("<img src='loader/loading.gif'/> Loading...");
					$.get("handler/get_notifications.php",function(response){
					    $('#notifs').html(response);
					    $('#not_hide_panel').click(function(){
						    $('#notifs').slideUp('slow');
						})
					})
				})*/
				$('#hide').click(function(){
					if($('#hide').html()=="Hide"){
						$(this).html('Show');
					}
					else{
						$(this).html('Hide');
					}
					$('#details').slideToggle('slow');
				});
				$('#h_s_online').click(function(){
					$('#online').slideToggle('slow');
				});
			})
		function editProfile(user)
		{
			var username=user;
			$.post("handler/edit_profile.php",{username:username},function(response){
				$('#edit_profile').html(response);
				$('#editModal').modal('show');
			})
		}
		function update(user)
		{
			$('#edit_loader').html("<img src='loader/loading.gif'/>");
			var name=$('#name').val();
			var email=$('#email').val();
			var phone=$('#phone_number').val();
			var location1=$('#location1').val();
			var high_school=$('#high_school').val();
			var college=$('#college').val();
			$.post("handler/submit_update.php",{name:name,email:email,phone:phone,location1:location1,high_school:high_school,college:college},function(response){
				if(response=="updated")
				{	
					location.reload(true);
				}
				else
				{
					alert("Error occured");
				}
			})
		}
		/*function make_post(user)
		{
			//var postin = $('#post').val();
			alert(user);
		}*/
		function overlay()
		{
			$.get("handler/get_about.php",function(response){
				$('#about').val(response);
			})
			el=document.getElementById("overlay");
			el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
		}
		function picdialog(id,username)
		{
			var id=id;
			el=document.getElementById("dialog");
			el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
			$('#paste_img').html("<div style='text-align:center;margin-top:200px'><img src='loader/loader.gif'/></div>");
			$.post("handler/get_postimgdialog.php",{id:id,username:username},function(response)
			{
				$('#paste_img').html(response);
			})
			$('#paste_com').html("<div style='text-align:center;margin-top:200px'><img src='loader/loading.gif'/></div>");
			$.post("handler/get_postcomdialog.php?page=1",{id:id},function(response)
			{
				$('#paste_com').html(response);
			})
			$.post("handler/get_allphoto_dia.php",{username:username},function(response)
			{
				$('#paste_all').html(response);
			})
		}
		function comment(div_id,id)
		{
			var post_id=id;
			$.post("handler/get_comments.php",{post_id:post_id},function(response)
			{
				$(div_id).html(response);
			})
		}
		function page(div_id,page,post_id)
		{
			var page=page;
			$('#pagin').html("<img src='loader/loading.gif'/><br/>");
			$.post("handler/get_comments.php?page="+page,{post_id:post_id},function(response)
			{
				$(div_id).html(response);
			})
		}
		function lpage(page,post_id)
		{
			var page=page;
			$('#lpagin').html("<img src='loader/loading.gif'/><br/>");
			$.post("handler/get_likes.php?page="+page,{post_id:post_id},function(response)
			{
				$('#plikes').html(response);
			})
		}
		function submit()
		{
			var about=$('#about').val();
			$('#confirm').html("<p style='text-align:center'><img src='loader/loading.gif'/></p>")
			$.post("handler/update_about.php",{about:about},function(response){
				if(response=="updated")
				{
					location.reload(true);
				}
				else
				{
					$('#confirm').html("<p class='alert alert-danger'style='text-align:center'>We could not update your profile</p>")
				}
			})
		}
		function more(id)
		{
			$(id).slideToggle('slow');
		}
		function postdel(id,post_id)
		{
			$('#delpost').modal('show');
			$('#cancel').click(function(){
				$('#delpost').modal('hide');
			})
			$('#delete').click(function(){
				$.post("handler/delete_post.php",{id:id},function(response){
					if(response=="deleted")
					{
						//alert(response);
						$('#delpost').modal('hide');
						document.getElementById("z"+id).style.display="none";
						$('#tell').html("Post has been deleted...").fadeIn('slow').delay(3000).fadeOut();
					}
					else
					{
						//alert(response);
						$('#tell').html("Error deleting post...").fadeIn('slow').delay(3000).fadeOut();
					}
				})
			})
		}
		function postedit(id,post_area)
		{
			var loader = document.getElementById("loading1000");
			var loader1 = document.getElementById("loading100");
			loader.style.display="block";
			$.post("handler/edit_post.php",{id:id},function(response)
			{
				if(response.success=="yes")
				{
					//alert(response.id);
					$('#mypostedit').val(response.message);
					$('#update_btn1').html(response.id);
					loader.style.display="none";
					$('#editpost').modal('show');
				}
				else
				{
					alert(response.message);
				}
			})
		}
		function update_post(id,post_area)
		{
			$('#edit_post_loader').html("<img src='loader/loading.gif'/>");
			var msg = $('#mypostedit').val();
			if(msg=="")
			{
				$('#editpost').modal('hide');
				$('#edit_post_loader').html("");
				$('#tell').html("The post field is empty").fadeIn('slow').delay(3000).fadeOut();
			}
			else
			{
				$.post("handler/update_post.php",{id:id,msg:msg},function(response)
				{
					//alert(response);
					if(reponse="updated")
					{
						//alert("yup");
						$('#editpost').modal('hide');
						$('#edit_post_loader').html("");
						$(post_area).html(msg);
						$('#tell').html("Post updated...").fadeIn('slow').delay(3000).fadeOut();
					}
					else
					{
						alert("An error occured");
					}
				})
			}
		}
		function postdown(file)
		{
			//alert(file);
			$.post("handler/download.php",{file:file});
		}		
		function postrep(id)
		{
			$('#rep_btn').val(id);
			el=document.getElementById("report");
			el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
		}
		function view(id)
		{
			var post_id=id;
			$('#plikes').html("<p style='text-align:center;margin-top:60px'><img src='loader/loader.gif'/></p>");
			el=document.getElementById("view");
			el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
			$.post("handler/get_likes.php?page=1",{post_id:post_id},function(response)
			{
				$('#plikes').html(response);
			})
		}
		function follow(username,id,page)
		{
			$.post("handler/addfriend.php",{username:username},function(response){
				if(response=="added")
				{
					$.post("handler/get_likes.php?page="+page,{post_id:id},function(response)
					{
						$('#plikes').html(response);
					})
				}
				else
				{
					alert("Error:could not add friend");
				}
			})
		}
		function unfollow(username,id,page)
		{
			$.post("handler/unfriend.php",{username:username},function(response){
				if(response=="deleted")
				{
					$.post("handler/get_likes.php?page="+page,{post_id:id},function(response)
					{
						$('#plikes').html(response);
					})
				}
				else
				{
					alert("Error:could not remove friend");
				}
			})
		}
		function unlikep(username,page,id)
		{
			$.post("handler/unlikep.php",{username:username},function(response){
				if(response=="deleted")
				{
					$.post("handler/get_likes.php?page="+page,{post_id:id},function(response)
					{
						$('#plikes').html(response);
					})
				}
				else
				{
					alert("Error:could not unlike post");
				}
			})
		}
		function likep(id,username,like_id)
		{
			$.post("handler/likep.php",{post_id:id},function(response){
				if(response=="added")
				{
					/*$.get("handler/loadpost.php?user="+username+"&page="+page,function(response){
						
						if(page==1)
						{
							//$('#posts').html(response);
							$(page_post).remove();
							$('#posts').prepend(response);
							$('#pg1').remove();
							$('.com').click();
						}
						else
						{
							$(page_post).remove();
							//$('.com').click();
							$('#posts').append(response);
							$('.com').click();
						}
					});*/
					$.post("handler/get_postlikes.php",{id:id,username:username,like_id:like_id},function(response){
						$(like_id).html(response);
					});
				}
			})
		}
		function unlikepro(id,username,like_id)
		{
			$.post("handler/unlikepro.php",{post_id:id},function(response){
				if(response=="deleted")
				{
					/*$.get("handler/loadpost.php?user="+username+"&page="+page,function(response){
						if(page==1)
						{
							//$('#posts').html(response);
							$(page_post).remove();
							$('#posts').prepend(response);
							$('#pg1').remove();
							$('.com').click();
						}
						else
						{
							$(page_post).remove();
							//$('.com').click();
							$('#posts').append(response);
							$('.com').click();
						}
					});*/
					$.post("handler/get_postlikes.php",{id:id,username:username,like_id:like_id},function(response){
						$(like_id).html(response);
					});
				}
			})
		}
		function addcomment(com_id,input_id,post_id,username,page)
		{
			var input_val=$(input_id).val();
			if(input_val=="")
			{
				$('#tell').html("The comment field can't be empty").fadeIn('slow').delay(3000).fadeOut();
			}
			else
			{
				$.post("handler/addcomment.php",{comment:input_val,post_id:post_id},function(response){
					if(response=="added")
					{
						/*$.get("handler/loadpost.php?user="+username+"&page="+page,function(response){
							if(page==1)
							{
								$('#posts').html(response);
							}
							else
							{
								$('#posts').append(response);
							}
						});*/
						comment(com_id,post_id);
						$(input_id).val("");
						$('#tell').html("Comment Added...").fadeIn('slow').delay(3000).fadeOut();
					}
					else
					{
						$('#tell').html("Could'nt add comment..").fadeIn('slow').delay(3000).fadeOut();
					}
				})
			}
		}
		function dialogpagn(id,username)
		{
			//alert(id);
			$.post("handler/dianext.php",{id:id,username:username},function(response)
			{
				$('#paste_img').html(response);
			})
			$.post("handler/comnext.php?page=1",{id:id},function(response)
			{
				$('#paste_com').html(response);
			})
		}
		function dialogpagp(id,username)
		{
			//alert(id+" "+username);
			$.post("handler/diaprev.php",{id:id,username:username},function(response)
			{
				$('#paste_img').html(response);
			})
			$.post("handler/comprev.php?page=1",{id:id},function(response)
			{
				$('#paste_com').html(response);
			})
		}
		function refresh_people()
		{
			$('#refresh').html("<img style='text-align:center'src='loader/loading.gif'/>");
			$.get("handler/refresh.php",function(response){
				$('#people').html(response);
			})
		}
		function pagedia(page,id)
		{
			$('#pagedia').html("<img style='text-align:center'src='loader/loading.gif'/>");
			$.post("handler/get_postcomdialog.php?page="+page,{id:id},function(response)
			{
				$('#paste_com').html(response);
			})
		}
		function pagedia1(page,id)
		{
			$('#pagedia').html("<img style='text-align:center'src='loader/loading.gif'/>");
			$.post("handler/comnext.php?page="+page,{id:id},function(response)
			{
				$('#paste_com').html(response);
			})
		}
		function addcommentdia(post_id)
		{
			var input_val=$('#cominput').val();
			$.post("handler/addcomment.php",{comment:input_val,post_id:post_id},function(response){
				if(response=="added")
				{
					$('#cominput').val("");
					$.post("handler/get_postcomdialog.php",{id:post_id},function(response)
					{
						$('#paste_com').html(response);
					})
					$('#tell').html("Comment Added...").fadeIn('slow').delay(3000).fadeOut();
				}
			})
		}
		function del_com_dia(id,post_id)
		{
			//var comment=$('#delete1').val(id);
			$('#delcom').modal('show');
			$('#cancel1').click(function(){
				$('#delcom').modal('hide');
			})
			$('#cont_dele').click(function(){
				//alert(id+" "+post_id);
				$.post("handler/delete_pf_comments.php",{id:id},function(response){
					//alert(response);
					if(response=="deleted")
					{
						$('#delcom').modal('hide');
						$.post("handler/get_postcomdialog.php",{id:post_id},function(response)
						{
							$('#paste_com').html(response);
						})
						$('#tell').html("Comment Deleted...").fadeIn('slow').delay(3000).fadeOut();
					}
				})
			})
		}
		function delcom_prof(id,post_id,com_id)
		{
			//var comment=$('#delete1').val(id);
			$('#delcom').modal('show');
			$('#cancel1').click(function(){
				$('#delcom').modal('hide');
			})
			$('#cont_dele').click(function(){
				//alert("Yup");
				$.post("handler/delete_pf_comments.php",{id:id},function(response){
					//alert(response);
					if(response=="deleted")
					{
						$('#delcom').modal('hide');
						comment(com_id,post_id);
						$('#tell').html("Comment Deleted...").fadeIn('slow').delay(3000).fadeOut();
					}
				})
			})
		}
		function fcom_delete(val)
		{
			alert(val);
		}
		function message(user)
		{
			/*$.post("handler/update_inbox.php",{username:user},function(response){
			if(response=="updated")
			{
				$.get("handler/get_inbox.php",function(response){
					$('#paste_msg_inbox').html(response);
				})
				$.get("handler/get_inbox_msg.php",function(response){
					$('#paste_num_msg').html(response);
					$('#paste_num_msg_main').html(response);
				})
				$.post("handler/get_chat.php",{username:user},function(response){
					$('#paste_chat').html(response);
					$('#receiver').html(user);
					$('#my_chat').show('fast');
				var g=setInterval(function(){
					$.post("handler/get_chat.php",{username:user},function(response){
						$('#paste_chat').html(response);
					})
				},1000);
				
				})
				$('#close1').click(function(){
					clearInterval(g);
					$('#my_chat').hide('fast');
				});
			}
			})*/
			update_inbox(user);
		}
	function send_message(user)
	{
	
			var msg=$('#message').val();
			//alert(user);
			$.post("handler/send_message.php",{message:msg,username:user},function(response){
				if(response=="sent"){
					$.post("handler/get_chat.php",{username:user},function(response){
						$('#paste_chat').html(response);
					})
				}
				else
				{
					alert(response);
				}
			})
			
	}
	function update_inbox(user)
	{
		$.post("handler/update_inbox.php",{username:user},function(response){
			if(response=="updated")
			{
				$.get("handler/get_inbox.php",function(response){
					$('#paste_msg_inbox').html(response);
				})
				$.get("handler/get_inbox_msg.php",function(response){
					$('#paste_num_msg').html(response);
					$('#paste_num_msg_main').html(response);
				})
					$.post("handler/get_chat.php",{username:user},function(response){
					$('#paste_chat').html(response);
					$('#receiver').html(user);
					$('#msg_send').val(user);
					$('#my_chat').show('fast');
				var g=setInterval(function(){
					$.post("handler/get_chat.php",{username:user},function(response){
						$('#paste_chat').html(response);
					})
				},1000);
				
				})
			}
			else
			{
				alert(response);
			}
		})
	}
	function close_chat()
	{
		$('#my_chat').hide('fast');
	}
	function minimise_chat()
	{
		$('#paste_chat').slideToggle('slow');
	}
	function report(id)
	{
		var rep=$('#report_about').val();
		var about = $('input:radio[name=about]:checked').val();
		var brief= $('#brief_report').val();
		$('#rep_loader').html("<img src='loader/loading.gif'/>");
		$.post("handler/make_report.php",{post_id:id,rep_about:rep,who_about:about,brief:brief},function(response){
			if(response=="reported")
			{
				$('#rep_loader').html("<p class='alert alert-success'>You have successfully made your report</p>");
			}
			else
			{
				setTimeout(function(){$('#rep_loader').html("<p class='alert alert-danger'>Sorry,an error occured</p>");},3000);
				//clearTimeout(time);
			}
		})
	}
	function share(id,user)
	{

		$('#share_loader').html("<img src='loader/loading.gif'/>");
		$.post("handler/get_postshare.php",{id:id},function(response){
			$('#share_loader').html(response);
		})
		el=document.getElementById("share");
		el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
	}
	function doshare(id,user,post,real_post)
	{
		//alert(post);
		$.post("handler/share_post.php",{post_id:id,username:user,post:post,real_post:real_post},function(response){
			if(response=="success")
			{
				var share = document.getElementById("share").style.visibility="hidden";
				$('#tell').html("Post shared...").fadeIn('slow').delay(3000).fadeOut();
			}
			else
			{
				$('#tell').html("Post was not shared...").fadeIn('slow').delay(3000).fadeOut();
			}
		})
	}
	function changedp()
	{
		$('#dp').modal('show');
		/*el=document.getElementById("dp");
		el.style.visibility=(el.style.visibility=="visible")? "hidden":"visible";
		*/
	}
	
	function _(el)
	{
		return document.getElementById(el);
	}
	function uploadFile()
	{
		_("progressBar").style.display="block";
		var file=_("file1").files[0];
		//alert(file.name+"|"+file.size+"|"+file.type);
		if(file.size<=2000000 && file.type=="image/jpeg")
		{
			var formdata=new FormData();
			formdata.append("file1",file);
			var ajax=new XMLHttpRequest();
			ajax.upload.addEventListener("progress",progressHandler,false);
			ajax.addEventListener("load",completeHandler,false);
			ajax.addEventListener("error",errorHandler,false);
			ajax.addEventListener("abort",abortHandler,false);
			ajax.open("POST","handler/file_upload.php");
			ajax.send(formdata);
		}
		else
		{
			_("status").innerHTML="Image must be jpeg and less than 2MB";
		}
	}
	function progressHandler(event)
	{
		_("loaded_n_total").innerHTML="Uploaded"+event.loaded+"bytes of"+event.total;
		var percent=(event.loaded/event.total)*100;
		_("progressBar").value=Math.round(percent);
		_("status").innerHTML=Math.round(percent)+"% uploaded...please wait";
	}
	function completeHandler(event)
	{
		_("status").innerHTML=event.target.responseText;
		_("progressBar").value=0;
		_("progressBar").style.display="none";
		location.reload(true);
	}
	function errorHandler(event)
	{
		_("status").innerHTML="Upload failed";
	}
	function abortHandler(event)
	{
		_("status").innerHTML="Upload aborted"
	}
	function refresh()
	{
		location.reload(true);
	}
	function hide_last_seen()
	{
		var lastseen = document.getElementById("lastseen");
		lastseen.style.display="none";
		
	}
	function edit_com(id,post_id,com_id)
	{
		var loader = document.getElementById("loading1000");
		var loader1 = document.getElementById("loading100");
		loader.style.display="block";
		$.post("handler/edit_comment.php",{id:id},function(response)
		{
			if(response.success=="yes")
			{
				//alert(response.id);
				$('#mycomedit').val(response.message);
				$('#update_btn').html(response.id);
				loader.style.display="none";
				$('#editcom').modal('show');
			}
			else
			{
				alert(response.message);
			}
		})
	}
	function update_com(id,post_id,com_id)
	{
			$('#edit_com_loader').html("<img src='loader/loading.gif'/>");
			var msg = $('#mycomedit').val();
			if(msg=="")
			{
				$('#editcom').modal('hide');
				$('#edit_com_loader').html("");
				$('#tell').html("The comment field is empty").fadeIn('slow').delay(3000).fadeOut();
			}
			else
			{
				$.post("handler/update_comment.php",{id:id,msg:msg},function(response)
				{
					//alert(response);
					if(reponse="updated")
					{
						//alert("yup");
						$('#editcom').modal('hide');
						$('#edit_com_loader').html("");
						comment(com_id,post_id);
						$('#tell').html("Comment updated...").fadeIn('slow').delay(3000).fadeOut();
					}
					else
					{
						alert("An error occured");
					}
				})
			}
	}
	function set_dp(id)
	{
		$('#set_dp').modal('show');
		$('#cont_dp').click(function(){
			//alert(id);
			$('#dp_loader').html("<img src='loader/loading.gif'/>");
			$.post("handler/get_image.php",{id:id},function(response){
				if(response==0)
				{
					$('#tell').html("Error fetching image").fadeIn('slow').delay(3000).fadeOut();
				}
				else
				{
					
					$.post("handler/set_dp.php",{image:response},function(data){
						if(data=="success")
						{
							location.reload(true);
							$('#tell').html("Profile picture updated").fadeIn('slow').delay(3000).fadeOut();
						}
						else
						{
							$('#tell').html("Error updating profile picture").fadeIn('slow').delay(3000).fadeOut();
							$('#dp_loader').html("");
						}
					})
				}
			})
		})
	}
	function edit_com_dia(id,post_id)
	{
		$.post("handler/edit_comment_dia.php",{id:id},function(response)
		{
			if(response.success=="yes")
			{
				$('#mycomedit').val(response.message);
				$('#update_btn').html(response.id);
				$('#editcom').modal('show');
			}
			else
			{
				alert(response.message);
			}
		})
	}
	function update_com_dia(id,post_id)
	{
			$('#edit_com_loader').html("<img src='loader/loading.gif'/>");
			var msg = $('#mycomedit').val();
			$.post("handler/update_comment.php",{id:id,msg:msg},function(response)
			{
				if(reponse="updated")
				{
					$('#editcom').modal('hide');
					$('#edit_com_loader').html("");
					$.post("handler/get_postcomdialog.php",{id:post_id},function(response)
					{
						$('#paste_com').html(response);
					})
					$('#tell').html("Comment updated...").fadeIn('slow').delay(3000).fadeOut();
				}
				else
				{
					alert("An error occured");
				}
			})
	}
	function getconnect(user)
	{
		//alert(user);
		var following_btn=document.getElementById("btn_following").style.opacity=0.3;
		$('#follower').html("<div align='center'style='margin-top:150px'><img src='loader/loader.gif'/><br/><span style='font-size:13px'>Loading friends...</span></div>");
		$.get("handler/get_follower.php?user="+user+"&page=1",function(response){
			$('#follower').html(response);
		});
		$.get("handler/get_following.php?user="+user+"&page=1",function(response){
			$('#following').html(response);
		});
	}
	function paginatef(page,user)
	{
		$('#paginate1').remove();
		$('#follower').append("<div align='center'class='load'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading...</span></div>");
		$.get("handler/get_follower.php?user="+user+"&page="+page,function(response){
			$('.load').remove();
			$('#follower').append(response);
		});
	}
	function paginatefo(page,user)
	{
		$('#paginate2').remove();
		$('#following').append("<div align='center'class='load'><img src='loader/loader.gif'/><br/><span style='font-size:12px'>Loading...</span></div>");
		$.get("handler/get_following.php?user="+user+"&page="+page,function(response){
			$('.load').remove();
			$('#following').append(response);
		});
	}
	function show_following(user)
	{
		var follower,following,follower_btn;
		follower=document.getElementById("follower").style.display="none";
		follower_btn=document.getElementById("btn_follower").style.opacity=0.3;
		following_btn=document.getElementById("btn_following").style.opacity=1;
		following=document.getElementById("following").style.display="block";
		//$('#following').html("<div align='center'style='margin-top:150px'><img src='loader/loader.gif'/><br/><span style='font-size:13px'>Loading friends...</span></div>");
	}
	function show_follower()
	{
		var follower,following,following_btn;
		following=document.getElementById("following").style.display="none";
		following_btn=document.getElementById("btn_following").style.opacity=0.3;
		follower_btn=document.getElementById("btn_follower").style.opacity=1;
		follower=document.getElementById("follower").style.display="block";
		
	}
	function show_summary(sum_id,user)
	{
		$(sum_id).fadeIn('slow');
		$(sum_id).html("<div style='background-color:#fff'><img src='loader/loading.gif'/><br/>Fetching user profile</div>");
		$.post("handler/get_prof_sum.php",{username:user},function(response){
			$(sum_id).html(response);
		})
	}	
	function hide_summary(sum_id)
	{
		$(sum_id).fadeOut('slow');
	}
	function hidepost(id)
	{
		$(id).hide('fast');
	}
	function make_post_image()
	{
		var file=document.getElementById("image").files[0];
		var caption=document.getElementById("pic_caption").value;
		if(file.size<=2000000 && file.type=="image/jpeg" || file.type=="image/png" || file.type=="image/gif")
		{
			var formdata=new FormData();
			formdata.append("image",file);
			formdata.append("pic_caption",caption);
			var ajax=new XMLHttpRequest();
			ajax.addEventListener("load",imagePostComplete,false);
			ajax.open("POST","handler/image_upload.php");
			ajax.send(formdata);
			
			//alert(file.name+" "+caption);
		}
		else
		{
			alert("please make sure the file format is jpeg/jpg and the size is less than 2MB");
		}
		
	}
	function imagePostComplete(event)
	{
		location.assign("feeds.php");
	}
	function make_post_video()
	{
		var file=document.getElementById("video").files[0];
		var caption=document.getElementById("clip_caption").value;
		if(file.size<=11000000 && file.type=="video/3gp" || file.type=="video/mp4" || file.type=="video/avi")
		{
			var formdata=new FormData();
			formdata.append("video",file);
			formdata.append("clip_caption",caption);
			var ajax=new XMLHttpRequest();
			ajax.addEventListener("load",videoPostComplete,false);
			ajax.open("POST","handler/video_upload.php");
			ajax.send(formdata);
			
			//alert(file.name+" "+caption);
		}
		else
		{
			alert("please make sure the file format is 3gp/avi/mp4 and the size is less than 11MB");
		}
		
	}
	function videoPostComplete(event)
	{
		location.assign("feeds.php");
	}