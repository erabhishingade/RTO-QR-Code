<?php require_once("lockc.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> | Forms :: TIASystem</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="TIASystem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script  src="js/jquery.min.js"></script>
<script type="text/javascript">
	function adpro()
	{
		//alert();
		var formData= new FormData($('#loginform')[0]);
		$.ajax({
			url:'imgupload.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				//alert(data);
				if(data=="success")
				{
					location.replace('vehidoc.php');	
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
</script>
</head>
<body>
<div class="panel-body">
<form id="loginform" name="loginform" action='javascript:;' onsubmit="adpro()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">Choose Picture:</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="upimg" name="upimg" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
</div>
</form>
</body>
</html>
<!--
<form id="loginform" name="loginform" action='javascript:;' onsubmit="adpro()" method="POST" enctype="multipart/form-data">
<input type="file" id="upimg" name="upimg" value=""/></br>
<input type="submit" id="sub" name="sub" value="upload"/></br>
</form>-->
