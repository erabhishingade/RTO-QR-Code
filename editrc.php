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
  
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
	function uploadrc()
	{
		//alert("il");
		var formData= new FormData($('#loginform3')[0]);
		$.ajax({
			url:'uploadrc.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{
					location.reload();	
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

<!----->

</head>
<body>
<div id="wrapper">
     <!----->
        <?php require_once("header.php");?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Forms</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
	<div class="grid-form">
  <div class="grid-form1">
  	       <h3>Edit RC</h3>
		   <div class="panel-body">
		   <form id="loginform3" name="loginform3" action='javascript:;' onsubmit="uploadrc()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">RC</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="rc" name="rc" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>
	</div>
	
  </div>
 	</div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy; 2016 TIAS. All Rights Reserved | Design by <a target="_blank"></a>TIAS</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
     <!--scrolling js-->
	</script>

</body>
</html>

