<?php require_once("lockc.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> | Forms :: user</title>
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
	function vdata()
	{
		//alert("hii");
		var vtype=$("#vtype").val();
		var vname=$("#vname").val();
		var vno=$("#vno").val();
		var chesseno=$("#chesseno").val();
		$.ajax({
			type:'POST',
			url:'vsave.php',
			data:{vtype:vtype,vname:vname,vno:vno,chesseno:chesseno},
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
					location.replace("vehidoc.php");
				}
				else
				{ 
					//alert(data);
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			}
		});
	}
	function uploadadhar()
	{
		//alert("il");
		var formData= new FormData($('#loginform1')[0]);
		$.ajax({
			url:'uploadadhar.php',
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
					//alert(data);
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
	function uploadlicense()
	{
		//alert("ilu");
		var formData= new FormData($('#loginform2')[0]);
		$.ajax({
			url:'uploadlicense.php',
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
	function uploadpuc()
	{
		//alert("il");
		var formData= new FormData($('#loginform4')[0]);
		$.ajax({
			url:'uploadpuc.php',
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
	function uploadinsu()
	{
		//alert("il");
		var formData= new FormData($('#loginform5')[0]);
		$.ajax({
			url:'uploadinsu.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{	
					location.replace("vehidoc.php");					
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
</head>
<body>
<div id="wrapper">
     <!----->
        <?php require_once("header.php");?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <!--<div class="banner">
		    	<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Forms</span>
				</h2>
		    </div>-->
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-form">
	<?php if($u_flag==1 && $d_flag==1){ ?>
  <div class="grid-form1">
  	       <h3>Vehicle</h3>
  <div class="panel-body">
					<form role="form" id="rform" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label">vehicle Type</label>
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
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">vehicle Company name</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" id="vname" name="vname" class="form-control1" placeholder="vehicle Company name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">vehicle no</label>
							<div class="col-md-8">
								<div class="input-group">							
									
									<input type="text" id="vno" name="vno" class="form-control1" placeholder="vehicle number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">chesseno</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input type="text" id="chesseno" name="chesseno" class="form-control1" type="text" placeholder="chesseno">
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
	<?php } elseif($u_flag==1 && $d_flag==2){ ?>
	<div>
	<div class="grid-form1">
  	       <h3>Documents upload</h3>
		   <div class="panel-body">
		   <?php if($adhar==""){ ?>
		   <form id="loginform1" name="loginform1" action='javascript:;' onsubmit="uploadadhar()" method="POST" enctype="multipart/form-data">
		   		<div class="form-group">
							<label class="col-md-2 control-label">Adhar</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="adhar" name="adhar" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
				</div>
			</form>
		   <?php }
		   if($license==""){ ?>
			<form id="loginform2" name="loginform2" action='javascript:;' onsubmit="uploadlicense()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">License</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="license" name="license" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
			</form>
			<?php }
if($rc==""){ ?>
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
			<?php } if($puc==""){ ?>
					<form id="loginform4" name="loginform4" action='javascript:;' onsubmit="uploadpuc()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">PUC</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="puc" name="puc" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>	
			<?php } if($insurance==""){ ?>
					<form id="loginform5" name="loginform5" action='javascript:;' onsubmit="uploadinsu()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">Insurance</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="insurance" name="insurance" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>	
			<?php } ?>
	</div>
	</div>
 </div>
	<?php }elseif($u_flag==2 && $d_flag==3){ ?>
	 <div class="profile">
		<div class="profile-bottom" style="width:100%">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			
			<?php if($propic==""){ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/user.png" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } else{ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } ?>
			<div class="col-md-6 profile-text">
				<h6>Personal Details</h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $username; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $uemail; ?></td></tr>
				
				<tr>
				<td>Status</td>
				<td> :</td>
				<td> QR Code Pending! Do verification...</td>
				</tr>
				
				<tr>
				<td>Adhar</td>
				<td> :</td>
				<td><?php echo $adharno; ?></td></tr>
				
				<tr>
				<td>Contact</td>
				<td> :</td>
				<td><?php echo $contact; ?></td></tr>
				
				<tr>
				<td>Address</td>
				<td> :</td>
				<td><?php echo $address; ?></td></tr>
				
				<tr>
				<td>Pin</td>
				<td> :</td>
				<td><?php echo $pin; ?></td></tr>
				
				</table>
			</div>
			
			
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/pending.png" style="width: 160px; height:160px;" alt="">
			</div>
			<div class="col-md-6 profile-text" style="margin-bottom:10px">
				<h6>Vehicle Details</h6>
				<table>
				<tr><td>Vehicle Name</td>  
				<td>:</td>  
				<td><?php echo $vname; ?></td></tr>
				
				<tr>
				<td>Chessi NO</td>
				<td> :</td>
				<td><?php echo $chesseno; ?></td>
				</tr>
				<tr>
				<td>Vehicle No</td>
				<td> :</td>
				<td><?php echo $vehicleno; ?></td>
				</tr>
				<tr>
				<tr>
				<td>License No</td>
				<td> :</td>
				<td><?php echo $licenseno; ?></td>
				</tr>
				<tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			 <div class="profile-bottom-bottom">
			<div class="col-md-4 profile-fo">
				<p>User</p>
				<a href="u.php" class="pro1"><i class="fa fa-pencil icon-pencil" ></i>Edit User Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<p>Vehicle</p>
				<a href="v.php" class="pro1"><i class="fa fa-pencil icon-pencil"></i>Edit Vehicle Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<p>Documents</p>
				<a href="doc.php" class="pro1"><i class="fa fa-cog"></i>Documents Details</a>
			</div>
			<div class="clearfix"></div>
			</div>
			<!--<div class="profile-btn">

                <button type="button" href="#" class="btn bg-red">Save changes</button>
           <div class="clearfix"></div>
			</div>-->
			
		</div>
	</div>
	
	<!--after verification-->
	<?php }elseif($u_flag==3 && $d_flag==3){ ?>
	
		 <div class="profile">
		<div class="profile-bottom" style="width:100%">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<!--<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>-->
			<?php if($propic==""){ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/user.png" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } else{ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } ?>
			<div class="col-md-6 profile-text">
				<h6>Personal Details</h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $username; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $uemail; ?></td></tr>
				
				<tr>
				<td>Status</td>
				<td> :</td>
				<td> Verified </td>
				</tr>
				
				<tr>
				<td>Adhar</td>
				<td> :</td>
				<td><?php echo $adharno; ?></td></tr>
				
				<tr>
				<td>Contact</td>
				<td> :</td>
				<td><?php echo $contact; ?></td></tr>
				
				<tr>
				<td>Address</td>
				<td> :</td>
				<td><?php echo $address; ?></td></tr>
				
				<tr>
				<td>Pin</td>
				<td> :</td>
				<td><?php echo $pin; ?></td></tr>
				
				</table>
			</div>
			
			
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img src="<?php echo $link; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<div class="col-md-6 profile-text" style="margin-bottom:10px">
				<h6>Vehicle Details</h6>
				<table>
				<tr><td>Vehicle Name</td>  
				<td>:</td>  
				<td><?php echo $vname; ?></td></tr>
				
				<tr>
				<td>Chessi NO</td>
				<td> :</td>
				<td><?php echo $chesseno; ?></td>
				</tr>
				<tr>
				<td>Vehicle No</td>
				<td> :</td>
				<td><?php echo $vehicleno; ?></td>
				</tr>
				<tr>
				<tr>
				<td>License No</td>
				<td> :</td>
				<td><?php echo $licenseno; ?></td>
				</tr>
				<tr>
				</table>
			</div>
			<div class="col-md-4 profile-fo">
				<a href="othervehicle.php" class="pro1"><i class="fa fa-cog"></i>other vehicle Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<a href="transfer.php?vno=<?php echo $vehicleno; ?>" class="pro1"><i class="fa fa-cog"></i>Transfer</a>
			</div>
			<div class="clearfix"></div>
			
			</div>
			
		</div>
	</div>
	<?php } elseif($u_flag==5 && $d_flag==5) { ?>
			<div class="profile">
		<div class="profile-bottom" style="width:100%">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<!--<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>-->
			<?php if($propic==""){ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/user.png" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } else{ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } ?>
			<div class="col-md-6 profile-text">
				<h6>Personal Details</h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $username; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $uemail; ?></td></tr>
				
				<tr>
				<td>Status</td>
				<td> :</td>
				<td> vehicle Transfered </td>
				</tr>
				
				<tr>
				<td>Adhar</td>
				<td> :</td>
				<td><?php echo $adharno; ?></td></tr>
				
				<tr>
				<td>Contact</td>
				<td> :</td>
				<td><?php echo $contact; ?></td></tr>
				
				<tr>
				<td>Address</td>
				<td> :</td>
				<td><?php echo $address; ?></td></tr>
				
				<tr>
				<td>Pin</td>
				<td> :</td>
				<td><?php echo $pin; ?></td></tr>
				
				</table>
			</div>
			
			
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/transfer.png" style="width: 160px; height:160px;" alt="">
			</div>
			<div class="col-md-4 profile-fo">
				<a href="othervehicle.php" class="pro1"><i class="fa fa-cog"></i>other vehicle Details</a>
			</div>
			<div class="clearfix"></div>
			
			</div>
			
		</div>
	</div>
	<?php } else { ?>
		<div class="profile">
		<div class="profile-bottom" style="width:100%">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<!--<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>-->
			<?php if($propic==""){ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/user.png" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } else{ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/<?php echo $propic; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } ?>
			<div class="col-md-6 profile-text">
				<h6>Personal Details</h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $username; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $uemail; ?></td></tr>
				
				<tr>
				<td>Status</td>
				<td> :</td>
				<td> Blocked </td>
				</tr>
				
				<tr>
				<td>Adhar</td>
				<td> :</td>
				<td><?php echo $adharno; ?></td></tr>
				
				<tr>
				<td>Contact</td>
				<td> :</td>
				<td><?php echo $contact; ?></td></tr>
				
				<tr>
				<td>Address</td>
				<td> :</td>
				<td><?php echo $address; ?></td></tr>
				
				<tr>
				<td>Pin</td>
				<td> :</td>
				<td><?php echo $pin; ?></td></tr>
				
				</table>
			</div>
			
			
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/blocked.jpg" style="width: 160px; height:160px;" alt="">
			</div>
			
			
			<div class="col-md-6 profile-text" style="margin-bottom:10px">
				<h6>Vehicle Details</h6>
				<table>
				<tr><td>Vehicle Name</td>  
				<td>:</td>  
				<td><?php echo $vname; ?></td></tr>
				
				<tr>
				<td>Chessi NO</td>
				<td> :</td>
				<td><?php echo $chesseno; ?></td>
				</tr>
				<tr>
				<td>Vehicle No</td>
				<td> :</td>
				<td><?php echo $vehicleno; ?></td>
				</tr>
				<tr>
				<tr>
				<td>License No</td>
				<td> :</td>
				<td><?php echo $licenseno; ?></td>
				</tr>
				<tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
	<?php } ?>
  </div>
 	</div>
 	<!--//grid-->
		<!---->
		
		<div>
		<div>
		<div>
<div class="copy">
           	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>
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
				chesseno:"required"
			},
			messages:
			{
				vtype:"please enter vehicle type",
				vname:"please enter vehicle branch",
				vno:"enter your vehicle no",
				chesseno:"enter your chesseno"
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

