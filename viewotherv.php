<?php require_once("lockc.php");
$vid=$_POST['vid'];
$userdata=$auth_user->fetchsvdetails($vid);
?>
<script src="js/jquery.min.js"> </script>
<script src="js/botstrap.min.js"> </script>
		<script type="text/javascript">
		</script>
 	 <div class="profile">
		<div class="profile-bottom" style="width:100%">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<?php if($userdata['profile']==""){ ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="uploads/user.png" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } else { ?>
			<div class="col-md-4 profile-bottom-img">
				<img src="../uploads/<?php echo $userdata['profile']; ?>" style="width: 160px; height:160px;" alt="">
			</div>
			<?php } ?>
			<div class="col-md-6 profile-text">
				<h6>Personal Details</h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $userdata['u_name']; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $userdata['u_email']; ?></td></tr>
				
				<tr>
				<td>Adhar</td>
				<td> :</td>
				<td><?php echo $userdata['u_adharno']; ?></td></tr>
				
				<tr>
				<td>Contact</td>
				<td> :</td>
				<td><?php echo $userdata['u_contact']; ?></td></tr>
				
				</table>
			</div>
			
			
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
			<?php if($userdata['approve_flag']==2) {
				$userdata=$auth_user->fetchqrsc($vid); ?>
				<img src="<?php echo $userdata["qrlink"]; ?>" style="width: 160px; height:160px;" alt="">
			<?php } elseif($userdata['approve_flag']==1){ ?>
				<img src="uploads/pending.png" style="width: 160px; height:160px;" alt="">
			<?php } else { ?>
				<img src="uploads/blocked.jpg" style="width: 160px; height:160px;" alt="">
			<?php } ?>
			</div>
			
			
			<div class="col-md-6 profile-text" style="margin-bottom:10px">
				<h6>Vehicle Details</h6>
				<table>
				<tr><td>Vehicle Name</td>  
				<td>:</td>  
				<td><?php $userdata=$auth_user->fetchsvdetails($vid);
				echo $userdata['v_name']; ?></td></tr>
				<tr>
				<td>Chessi NO</td>
				<td> :</td>
				<td><?php echo $userdata['chesseno']; ?></td>
				</tr>
				<tr>
				<td>Vehicle No</td>
				<td> :</td>
				<td><?php echo $userdata['v_no']; ?></td>
				</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">
			<div class="col-md-2 profile-fo">
				<!--<h4>348</h4>-->
				<p>License</p>
				<a class="pro1" target="blank" href="uploads/<?php echo $userdata['license']; ?>" ><i class="fa fa-cog"></i>License</a>
			</div>
			<div class="col-md-2 profile-fo">
				<!--<h4>23,5k</h4>-->
				<p>RC</p>
				<a class="pro1" target="blank" href="uploads/<?php echo $userdata['rc']; ?>" ><i class="fa fa-cog"></i>RC</a>
			</div>
			<div class="col-md-2 profile-fo">
				<!--<h4>23,5k</h4>-->
				<p>PUC</p>
				<a class="pro1" target="blank" href="uploads/<?php echo $userdata['puc']; ?>" ><i class="fa fa-cog"></i>PUC</a>
			</div>
			<div class="col-md-2 profile-fo">
				<!--<h4>23,5k</h4>-->
				<p>Insurance</p>
				<a class="pro1" target="blank" href="uploads/<?php echo $userdata['insurance']; ?>" ><i class="fa fa-cog"></i>Insurance</a>
			</div>
			<!--
			<div class="col-md-4 profile-fo">
				<p>Vehicle</p>
				<a href="sv.php" class="pro1"><i class="fa fa-pencil icon-pencil"></i>Edit Vehicle Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<p>Documents</p>
				<a href="svdoc.php" class="pro1"><i class="fa fa-cog"></i>Documents Details</a>
			</div>
			-->
			<div class="clearfix"></div>
			</div>
			
		</div>
	</div>