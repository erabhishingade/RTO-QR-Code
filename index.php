<?php
require_once("userclass.php");
$login= new USER();
$pin= $login -> getpins();
 if($login -> is_loggedin()!= "")
		{
			$login->redirect('vehidoc.php');
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Signup :: USER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="TIASystem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script  src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function logindata()
	{
		//alert("ilu ");
		var uname=$("#uname").val();
		var umail=$("#umail").val();
		var pass=$("#pass").val();
		var contact=$("#contact").val();
		var adhar=$("#adhar").val();
		var address=$("#address").val();		
		var pin=$("#pin").val();
		var licenseno=$("#licenseno").val();
		$.ajax({
			type:'POST',
			url:'save.php',
			data:{uname:uname,umail:umail,pass:pass,contact:contact,adhar:adhar,address:address,pin:pin,licenseno:licenseno},
			success:function(data)
			{
				//alert(data);
				if(data=="success")
				{
				/*	//location.replace('userc.php');
					$('#success').show();
					$('#success').html(data);
					//$('#success').css('color','green');
					$('#rform')[0].reset();
					$('#success').fadeOut(5000);
					location.replace('login.php');*/
					location.replace('login.php');
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					//$('#error').fadeOut(5000);			
				}
			}
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
		<h1><a href="index.html">USER PANEL</a></h1>
		<div class="login-bottom">
		<form id="rform">
			<h2>Register</h2>
			
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" id="uname" name="uname" value="" placeholder="Username">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="umail" name="umail" value="" placeholder=" Email">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" id="pass" name="pass" value="" placeholder="Password">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="contact" name="contact" maxlength="10" value="" placeholder="contactno">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="adhar" name="adhar" maxlength="12" value="" placeholder="adharno">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="address" name="address" value="" placeholder="address">
					<i class="fa fa-lock"></i>
				</div>
					<select class="login-mail" id="pin" name="pin" style="width
					:100%;" >
									<option value="">Select Office</option>
									<?php foreach($pin as $pinlist){ ?>
									<option value="<?php echo $pinlist['ad_id']; ?>"><?php echo $pinlist['ad_uname']; ?></option>
									<?php } ?>
					</select>
				<div class="login-mail">
					<input type="text" id="licenseno" name="licenseno" value="" placeholder="licenseno">
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
					<p>Already register</p>
				<a href="login.php" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			
			</form>
			
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
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#rform").validate({
			rules: {
				uname:"required",
				umail:
				{
					required:true,
					email:true
				},
				pass:"required",
				contact:
				{
					required:true,
					number:true,
					remote:{
						url:'chkno.php',
						type:"POST"
					}
				},
				adhar:
				{
					required:true,
					number:true,
					remote:{
						url:'chkadhar.php',
						type:"POST"
					}
				},
				address:"required",
				pin:
				{
					required:true,
					number:true
				},
				licenseno:"required"
			},
			messages:
			{
				uname:"please enter name",
				umail:
				{
					required:"enter your email",
					email:"enter valid email"
				},
				pass:"enter your password",
				contact:
				{
					required:"enter your contact no",
					number:"enter digits",
					remote:"Contact no already exists"
				},
				adhar:
				{
					required:"enter your adhar no",
					number:"enter digits",
					remote:"Adhar no already exists"
				},
				address:"enter address",
				pin:
				{
					required:"enter pin code",
					number:"enter digits of pincode"
				},
				licenseno:"enter your lisence no"
			},
			submitHandler:function(form)
			{
				logindata();
			}
		});
	});
	</script>
</body>
</html>