<!DOCTYPE html>
<head>
	<title>Image thumbnail testing</title>
	<script>
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
	<input type="file"onchange="PreviewFile()"/><br/>
	<img src=""height="100"width="100"alt="image preview"/>
</body>
</html>
