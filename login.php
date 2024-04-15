<?php 
	require_once("userclass.php");
	$login=new USER();
	
		if($login -> is_loggedin()!= "")
		{
			$login->redirect('vehidoc.php');
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> | Signin :: </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="TIAS Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
		<script type="text/javascript">
		function logindata()
		{
				var uname=$("#umail").val();
				var umail=$("#umail").val();
				var upass=$("#pass").val();
				$.ajax({
				type:'POST',
				url:'check.php',
				data:{uname:uname,umail:umail,upass:upass},
				success:function(data)
				{
					//alert(data);
					if(data=="success")
					{
						location.replace('vehidoc.php');
					}
					else
					{
						$('#error').html(data);
						$('#error').css('color','red');							
					}
				}
			});
		}
		</script>
</head>
<body>
	<div class="login">
		<h1><a href="index.html">USER PANEL </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" id="umail" name="umail" value="" placeholder="email">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" id="pass" name="pass" placeholder="Password" value="">
					<i class="fa fa-lock"></i>
				</div>
				  
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" id="login" name="sub" value="login" onclick="logindata()">
					</label>
					<p>Do not have an account?</p>
				<a href="index.php" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>
	</div>
		<!---->
<div class="copy-right">
            	    </div>  
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

