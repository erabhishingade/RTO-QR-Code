<?php
	require_once("cookie.php");
	require_once("lockc.php");
	require_once("userclass.php");
	$fl_user=new USER();
	$user_id=$uid;
	$stmt=$fl_user->runQuery("SELECT * FROM user WHERE u_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	$path="uploads/";
	$valid_formats=array("jpg","png","gif","bmp","JPG");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$time=time();
		$actual_image_name=$_FILES['upimg']['name'];
		$reimg=$time.$actual_image_name;
		$size=$_FILES['upimg']['size'];
		$tmp=$_FILES['upimg']['tmp_name'];
		$ext=explode(".",$actual_image_name);
		if(move_uploaded_file($tmp,$path.$reimg))
		{
			if($fl_user->insertprof($reimg,$user_id))
			{
				//echo "<img style='width:100%' src='$path/$reimg'>";
				echo "success";
			}
			else
			{
				echo "not";
			}
		}
		else
		{
			echo "Invalid format";
		}
	}
	
?>