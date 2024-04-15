<?php
error_reporting(0);
include('lock.php');
$path = "uploads/";
	$valid_formats = array("jpg", "png", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
		 $name = $_FILES['fl']['name'];
		 $size = $_FILES['fl']['size'];
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							      $actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
								  $tmp = $_FILES['fl']['tmp_name'];
								  $imgData = base64_encode(file_get_contents($img_file));
                                 // Format the image SRC:  data:{mime};base64,{data};
                                $src = 'data:;base64,'.$imgData;
								$sql=mysql_query("SELECT *  FROM post WHERE post_content LIKE '%$imgData%'");
								$cnt=mysql_num_rows($sql);
								if($cnt == 0){
			mysql_query("INSERT INTO post (post_content, imgname, post_flag, post_time, main_color) VALUES ('$imgData', '$actual_image_name', '1', '$ago', '$mainColor')");
			echo $str="Now we are save this image database";
			//unlink($img_file);?>
				<div class="single">
		<div class="container">
		   <div class="single_box1">
			 <div class="col-sm-5 single_left">
				<img src="<?php echo $src ; ?>" class="img-responsive" alt=""/>
			 </div>
			 <div class="col-sm-7 col_6">
				<a class="btn_3" href="">Download this Photo</a>
				<p class="movie_option"><strong>Upload Date : </strong><?php echo date("M d, Y", $ago)?></p>
			</div>
			<div class="clearfix"> </div>
		  </div>
		   
			
	    </div>
	</div>
<?php	
}else{
 $sqlc=mysql_query("SELECT *  FROM post WHERE post_content LIKE '%$imgData%'
	OR main_color LIKE  '%$mainColor%'");
								while($row=mysql_fetch_array($sqlc))
{
$commt=$row['post_commt'];
$imgData=$row['post_content'];
$post_id=$row['post_id'];
$file_name=$row['file_name'];
$pname=$row['name'];
$profile_pic=$row['profile_pic'];
$puid=$row['uid'];
$log=$row['post_time'];
 $src1 = 'data: ;base64,'.$imgData;
 ?>
	<div class="single">
		<div class="container">
		   <div class="single_box1">
			 <div class="col-sm-5 single_left">
				<img src="<?php echo $src1 ; ?>" class="img-responsive" alt=""/>
			 </div>
			 <div class="col-sm-7 col_6">
				<a class="btn_3" href="">Download this Photo</a>
				<p class="movie_option"><strong>Upload Date : </strong><?php echo date("M d, Y", $log)?></p>
			</div>
			<div class="clearfix"> </div>
		  </div>
	    </div>
	</div><?php
//echo "<img style=' border:1px solid ; width:20%; padding:20px;' alt='' src='$src'>";
							} } 		
						}
						else
						echo "<div class='col-md-4 span4'>
			 </div>
   	   		<div class='col-md-4 span4'>
   	   			<div class='plan-options'>
   	   				<div class='plan-price'>
						<strong>Image size is too large </strong>
					</div>
				</div>
			 </div>
			 <div class='col-md-4 span4'>
			 </div>
			 <div class='clearfix'> </div>";
					           
					}
						else
						echo "<div class='col-md-4 span4'>
			 </div>
   	   		<div class='col-md-4 span4'>
   	   			<div class='plan-options'>
   	   				<div class='plan-price'>
						<strong>Invalid File Format</strong>
					</div>
				</div>
			 </div>
			 <div class='col-md-4 span4'>
			 </div>
			 <div class='clearfix'> </div>";
				}
				
			else
			echo "<div class='col-md-4 span4'>
			 </div>
   	   		<div class='col-md-4 span4'>
   	   			<div class='plan-options'>
   	   				<div class='plan-price'>
						<strong>Please select image..</strong>
					</div>
				</div>
			 </div>
			 <div class='col-md-4 span4'>
			 </div>
			 <div class='clearfix'> </div>";
		}
?>