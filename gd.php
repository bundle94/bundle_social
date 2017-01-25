<?php
	//header("Content-type: image/jpeg");
	$pic= "uploads/IMG_20151202_141202.jpg";
	
	$imagesize=getimagesize($pic);
	echo $image_width=$imagesize[0]."<br/>";
	echo $image_height=$imagesize[1];
	if($image_width<2000)
	{
		echo "<img src='{$pic}'width='400'height='450'/><br/>";
	}
	
	
	/*function resize_image($file,$w,$h,$crop=FALSE)
	{
		list($width,$height)=getimagesize($file);
		$r=$width/$height;
		if($crop)
		{
			if($width>$height)
			{
				$width=ceil($width-($width*abs($r-$w/$h)));
			}
			else
			{
				$height=ceil($height-($height*abs($r-$w/$h)));
			}
			$newwidth=$w;
			$newheight=$h;
		}
		else
		{
			if($w/$h>$r)
			{
				$newwidth=$h*$r;
				$newheight=$h;
			}
			else
			{
				$newheight=$w/$r;
				$newwidth=$w;
			}
		}
		$dst=imagecreatetruecolor($newwidth,$newheight);
		$src=imagecreatefromjpeg($file);
		imagecopyresized($dst,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		return imagejpeg($dst);
		
	}
	$img=resize_image($pic,690,450);
	*/


echo "<video id='video'src='uploads/Student Exam Result System in PHP & MYSQL With Source Codes.mp4'width='500'height='300'></video><br/>";
echo "<div id='control'>";
echo "<input type='range'id='seek-bar'value='0'/> <button type='button'id='play-pause'>Play</button>";
echo "<button type='button'id='mute'>Mute</button>";
echo "<input type='range'id='volume-bar'min='0'max='1'step='0.1'value='1'/>";
echo "<button type='button'id='fullscreen'>Fullscreen</button>";
echo "</div>";
?>
<script src="js/jquery-2.1.3.min.js"></script>
<script>
	var playbtn=document.getElementById("play-pause");
	var video=document.getElementById("video");
	var mute=document.getElementById("mute");
	var volume=document.getElementById("volume-bar");
	var seek=document.getElementById("seek-bar");
	var fullscreen=document.getElementById("fullscreen");

	
	playbtn.addEventListener("click",function(){
		if(video.paused==true)
		{
			video.play();
			playbtn.innerHTML="Pause";
		}
		else
		{
			video.pause();
			playbtn.innerHTML="Play";
		}
	});
	mute.addEventListener("click",function(){
		if(video.muted==false)
		{
			video.muted=true;
			mute.innerHTML="Unmute";
		}
		else
		{
			video.muted=false;
			mute.innerHTML="Mute";
		}
	});
	fullscreen.addEventListener("click",function(){
		if(video.requestFullscreen)
		{
			video.requestFullscreen();
		}
		else if(video.mozRequestFullscreen)
		{
			video.mozRequestFullscreen();
		}
		else if(video.webkitRequestFullscreen)
		{
			video.webkitRequestFullscreen();
		}
	});
	seek.addEventListener("change",function(){
		var time=video.duration*(seek.value/100);
		video.currentTime=time;
	});
	video.addEventListener("timeupdate",function(){
		var value=(100/video.duration)*video.currentTime;
		seek.value=value;
	});
	seek.addEventListener("mousedown",function(){
		video.pause();
	});
	seek.addEventListener("mouseup",function(){
		video.play();
	});
	volume.addEventListener("change",function(){
		video.volume=volume.value;
	});
	/*$('#video').mouseover(function(){
		$('#control').fadeIn("slow");
	});
	$('#video').mouseout(function(){
		$('#control').fadeOut("slow");
	});*/
</script>