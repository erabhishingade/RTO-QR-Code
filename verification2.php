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

</head>
<body>
	<div id="wrapper">
		<?php require_once("header.php");?>
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">
				<div class="banner">
					<h2>
					<a href="index.html">Home</a>
					<i class="fa fa-angle-right"></i>
					<span>Forms</span>
					</h2>
				</div>
				<?php if($uflag==1 && $dflag==1){ ?>
				<div class="grid-form">
					<div class="grid-form1">
					
					<form id="rform">
					<h3>Vehicle</h3>
						<div class="panel-body">
							<form role="form" class="form-horizontal">
								<div class="form-group">
									<label class="col-md-2 control-label">vehicle branch name</label>
									<div class="col-md-8">
										<div class="input-group">							
											<input type="text" id="vname" name="vname" value="" class="form-control1" placeholder="vehicle branch name">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">licenseno</label>
									<div class="col-md-8">
										<div class="input-group">
											<input type="text" id="licenseno" name="licenseno" value="" class="form-control1" placeholder="licenseno">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">chesseno</label>
									<div class="col-md-8">
										<div class="input-group input-icon right">
											<input type="text" id="chesseno" name="chesseno" value="" placeholder="chesseno" class="form-control1">
										</div>
									</div>
								</div>
							</form>
						</div>
					<div class="bs-example" data-example-id="form-validation-states-with-icons">
					<form>
					<span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
					</div>
     
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
							<!--	<button class="btn-primary btn">Submit</button>  -->
							<input type="submit" value="Submit" id="register" name="sub">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>	
		</div>
 	</div>
				<?php } elseif($uflag==1 && $dflag==1){ ?>
		
				<?php } ?>
		<div class="copy">
            <p> &copy; 2016 TIASystem. All Rights Reserved | Design by <a href="http://TIASystem.com/" target="_blank">TIASystem</a> </p>	    
		</div>
		</div>
		</div>
		<div class="clearfix"> </div>
		</div>
		</div>
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