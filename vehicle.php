<?php require_once("lockc.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Signup :: Katareinfo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Katareinfo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script  src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function vdata()
	{
		var vname=$("#vname").val();
		var licenseno=$("#licenseno").val();
		var chesseno=$("#chesseno").val();
		$.ajax({
			type:'POST',
			url:'vsave.php',
			data:{vname:vname,licenseno:licenseno,chesseno:chesseno},
			success:function(data)
			{
				//alert(data);
				if(data=="success")
				{
					//location.replace('userc.php');
					$('#success').show();
					$('#success').html(data);
					//$('#success').css('color','green');
					$('#rform')[0].reset();
					$('#success').fadeOut(5000);
					location.reload();
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			}
		});
	}
	function docupload()
	{
		alert();
		var formData= new FormData($('#loginform')[0]);
		$.ajax({
			url:'uploaddoc.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				alert(data);
				if(data=="success")
				{
					$('#success').show();
					$('#success').html(data);
					$('#rform')[0].reset();
					$('#success').fadeOut(5000);
					location.replace('userc.php');	
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
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body><div id="error" style="display:none; text-align: center;" class="alert alert-danger" role="alert">
        
       </div>
	<div id="success" style="display:none; text-align: center;"  class="alert alert-success" role="alert">
        
       </div>

	<div class="login">
		<h1><a href="index.html">TIASystem </a></h1>
		<div class="login-bottom">
		<?php if($uflag==1 && $dflag==1){ ?>
		<form id="rform">
			<h2>VehicleDetails</h2>
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" id="vname" name="vname" value="" placeholder="vname">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="licenseno" name="licenseno" value="" placeholder="licenseno">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="chesseno" name="chesseno" value="" placeholder="chesseno">
					<i class="fa fa-lock"></i>
				</div>
				
				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>
	
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Submit" id="register" name="sub">
					</label>
			</div>
			</form>
			<?php }?>
			<?php if($uflag==1 && $dflag==2){ ?>
		<form id="loginform" name="loginform" action='javascript:;' onsubmit="docupload()" method="POST" enctype="multipart/form-data">
			<h2>UploadDocuments</h2>
			
			<div class="col-md-6">
				<div class="login-mail">
					<input type="file" id="adhar" id="adhar" name="adhar" value=""/></br>
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="file" id="license" name="licenseno" value="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="file" id="RC" name="RC" value="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="file" id="PUC" name="PUC" value="">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="file" id="Insurance" name="Insurance" value="">
					<i class="fa fa-lock"></i>
				</div>
				
				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>
	
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
				<input type="submit" id="sub" name="sub" value="upload"/></br>
					</label>
			</div>
		</form>
			<?php }?>
			
			<div class="clearfix"> </div>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 TIASystem. All Rights Reserved | Design by <a href="http://TIASystem.com/" target="_blank">TIASystem</a> </p>	    </div>
	  
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#rform").validate({
			rules: {
				vname:"required",
				licenseno:
				{
					required:true,
					number:true
				},
				chesseno:
				{
					required:true,
					number:true
				}
			},
			messages:
			{
				vname:"please enter vehicle branch",
				licenseno:
				{
					required:"enter your contact no",
					number:"enter digits"
				},
				chesseno:
				{
					required:"enter your adhar no",
					number:"enter digits"
				}
			},
			submitHandler:function(form)
			{
				vdata();
			}
		});
	});
	</script>
</body>
</html>