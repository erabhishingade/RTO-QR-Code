<?php require_once("lockc.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
<title> | Inbox :: Katareinfo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Katareinfo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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
		alert("il");
		var uname=$("#uname").val();
		var contact=$("#contact").val();
		var adhar=$("#adhar").val();
		var address=$("#address").val();		
		var pin=$("#pin").val();
		var licenseno=$("#licenseno").val();
		$.ajax({
			type:'POST',
			url:'uedit.php',
			data:{uname:uname,contact:contact,adhar:adhar,address:address,pin:pin,licenseno:licenseno},
			success:function(data)
			{
				if(data=="success")
				{
					//location.replace('userc.php');
					$('#success').show();
					$('#success').html(data);
					//$('#success').css('color','green');
					$('#rform')[0].reset();
					$('#success').fadeOut(5000);
					location.replace('vehidoc.php');
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
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

</head>
<body>
<div id="wrapper">
       <!----->
       <?php require_once("header.php");  ?>
		<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		    <!-- <div class="banner">
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Inbox</span>
				</h2>
		    </div>-->
		<!--//banner-->
 	<!--grid-->
<!-- tab content -->
<div class="col-md-15 tab-content tab-content-in" style="padding: 15px;">
<div class="tab-pane active text-style" id="tab1" style="padding: 20px;">
  <div class="inbox-right" style="padding: 20px;">
         	
            <div class="mailbox-content" style="padding: 30px;">
               <div class="mail-toolbar clearfix">
                
				<form id="rform" method="POST" >
			<h2>Edit User Details</h2>
			
			<div class="col-md-8" style="padding: 30px;">
				<div class="login-mail">
					<input type="text" id="uname" name="uname" value="" placeholder="Username">
					<i class="fa fa-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="contact" name="contact" value="" placeholder="contactno">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="adhar" name="adhar" value="" placeholder="adharno">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="address" name="address" value="" placeholder="address">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="pin" name="pin" value="" placeholder="pin">
					<i class="fa fa-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" id="licenseno" name="licenseno" value="" placeholder="licenseno">
					<i class="fa fa-lock"></i>
				</div>
				
				  <a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms</label>
					   </a>
	
			
			<div class="col-md-4 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Submit" id="register" name="sub">
				</label>
			</div>
			</div>
			</form>
</div>
<div class="copy">
            <p> &copy; 2016 Katareinfo. All Rights Reserved | Design by <a href="http://Katareinfo.com/" target="_blank">Katareinfo</a> </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
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
				contact:
				{
					required:true,
					number:true
				},
				adhar:
				{
					required:true,
					number:true
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
				contact:
				{
					required:"enter your contact no",
					number:"enter digits"
				},
				adhar:
				{
					required:"enter your adhar no",
					number:"enter digits"
				},
				address:"enter address",
				pin:
				{
					required:"enter pin code",
					number:"enter digits of pincode"
				},
				licenseno:"please enter licenseno"
			},
			submitHandler:function(form)
			{
				logindata();
			}
		});
	});
	</script>
	<!--//scrolling js-->
</body>
</html>

