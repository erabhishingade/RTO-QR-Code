<?php require_once("lockc.php"); ?>

<!DOCTYPE HTML>
<html>
<head>
<title> | Inbox :: TIASystem</title>
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
<script type="text/javascript"> 
	function vdata()
	{
		var vtype=$("#vtype").val();
		var vname=$("#vname").val();
		var vno=$("#vno").val();
		var chesseno=$("#chesseno").val();
		$.ajax({
			type:'POST',
			url:'vedit.php',
			data:{vtype:vtype,vname:vname,vno:vno,chesseno:chesseno},
			success:function(data)
			{
				alert(data);
				if(data=="success")
				{
					//location.replace('userc.php');
					$('#success').show();
					$('#success').html(data);
					//$('#success').css('color','green');
					$('#rform')[0].reset();
					$('#success').fadeOut(5000);
					location.replace("vehidoc.php");
				}
				else
				{
					alert(data);
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
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
<div class="col-md-10 tab-content tab-content-in" style="padding: 15px;">
<div class="tab-pane active text-style" id="tab1" style="padding: 15px;">
  <div class="inbox-right" >
         	
            <div class="mailbox-content" style="padding: 15px;">
               <div class="mail-toolbar clearfix" >
                
				<form role="form" id="rform" class="form-horizontal" style="padding: 30px;" >
				<h2>Edit vehicle Details</h2>
				<div class="col-md-8" style="padding: 30px;">
						<div class="form-group">
							<label class="col-md-3 control-label">vehicle type</label>
							<div class="col-md-8">
								<div class="input-group">							
									<select type="text" id="vtype" name="vtype" class="form-control1" >
									<option value="">Select Vehicle Type</option>
									<option value="2">2 Wheeler</option>
									<option value="3">3 Wheeler</option>
									<option value="4">4 Wheeler</option>
									</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">vehicle branch name</label>
							<div class="col-md-8">
								<div class="input-group">							
									
									<input type="text" value="<?php echo $name; ?>" id="vname" class="form-control1" placeholder="vehicle branch name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">vehicle Number</label>
							<div class="col-md-8">
								<div class="input-group">							
									
									<input type="text" value="<?php echo $no; ?>" id="vno" class="form-control1" placeholder="vehicle no">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">chesseno</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input type="text" value="<?php echo $chesseno; ?>" id="chesseno" class="form-control1" type="text" placeholder="chesseno">
								</div>
							</div>
						</div>
					</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn-primary btn">Submit</button>
									</div>
								</div>
							</div>
					</form>
				
			</div>
            </div>
</div>

<div class="copy">
            <p> &copy; 2016 TIASystem. All Rights Reserved | Design by <a href="http://TIASystem.com/" target="_blank">TIASystem</a> </p>	    </div>
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
				vtype:"required",
				vname:"required",
				vno:"required",
				chesseno:
				{
					required:true,
					number:true
				}
			},
			messages:
			{
				vtype:"please enter vehicle type",
				vname:"please enter vehicle branch",
				vno:"please enter vehicle no",
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
	<!--//scrolling js-->
</body>
</html>

