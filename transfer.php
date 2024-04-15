<?php require_once("lockc.php");
$vnumber=$_GET['vno']; 
$vnos1=$auth_user->fetchvnos1($uid);

$vnos2=$auth_user->fetchvnos2($uid);
//print_r($vnos2);
$users=$auth_user->fetchusers($uid); 
//print_r($users);
?>
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
                <h2>Edit vehicle Details</h2>
				<form role="form" id="rform"  action="trnsfrstore.php" method="POST" class="form-horizontal" style="padding: 30px;" >
				
					<input type="hidden" value="<?php echo $vnumber; ?>" id="vnumber" name="vnumber" >
						<div class="form-group">
							<label class="col-md-3 control-label">Buyer name</label>
							<div class="col-md-8">
								<div class="input-group">		
									<input list="buyer" id="adharno" name="adharno" value="" class="form-control1"  />
									<datalist id="buyer"  >
									<option value="">Select Buyer</option>
									<?php foreach($users as $usr) { ?>
									<option value="<?php echo $usr['u_adharno']; ?>"></option>
									<?php } ?>
									</datalist>
								</div>
							</div>
						</div>
							<div class="form-group">
							<label class="col-md-3 control-label">Date</label>
								<div class="col-md-8">
									<div class="input-group">							
									<input type="date" id="dt" name="dt" class="form-control1" placeholder="date">
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
				adharno:"required",
				date:"required"
			},
			messages:
			{
				adharno:"please enter adharno",
				date:"please enter date"
			},
			submitHandler:function(form)
			{
				//alert("successfully transfered");
				form.submit();
			}
		});
	});
	</script>
	<!--//scrolling js-->
</body>
</html>

