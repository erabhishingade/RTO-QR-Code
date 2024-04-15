<div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<?php if($propic==""){?>
				<div class="col-md-4 profile-bottom-img">
					<img style="width: 160px; height:160px;" src="uploads/user.png" alt="">
				</div>
			<?php } else { ?>
				<div class="col-md-4 profile-bottom-img">
					<img style="width: 168px;" src="uploads/<?php echo $propic; ?>" alt="">
				</div>
			<?php } ?>
			<div class="col-md-8 profile-text">
				<h6><?php echo "$username";?></h6>
				<table>
				<tr><td>Name</td>  
				<td>:</td>  
				<td><?php echo $username;?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><a href="<?php echo $uemail; ?>"><?php echo $uemail; ?></a></td>
				</tr>
				<tr>
				<td>Status</td>
				<td> :</td>
				<td> QR Code Pending! Do verification...</td>
				</tr>
				<tr>
				<td>Adhar </td>
				<td>:</td>
				<td><?php echo $adharno;?></td>
				</tr>
				<tr>
				<td>Contact </td>
				<td>:</td>
				<td><?php echo $contact;?></td>
				</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">
			<div class="col-md-4 profile-fo">
				<h4>23,5k</h4>
				<p>User</p>
				<a href="#" class="pro"><i class="fa fa-plus-circle"></i>User Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4>348</h4>
				<p>Vehicle</p>
				<a href="#" class="pro1"><i class="fa fa-user"></i>Vehicle Details</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4>23,5k</h4>
				<p>Documents</p>
				<a href="doc.php"><i class="fa fa-cog"></i>Documents Details</a>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-btn">

                <button type="button" href="#" class="btn bg-red">Save changes</button>
           <div class="clearfix"></div>
			</div>
			 
			
		</div>
	</div>