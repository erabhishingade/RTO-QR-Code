<?php
	require_once("lockc.php");
	$user_id=$uid;
	$stmt=$auth_user->runQuery("SELECT * FROM user WHERE u_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	$path="uploads/";
	$valid_formats=array("pdf");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$time=time();
		$actual_image_name=$_FILES['rc']['name'];
		$reimg=$time.$actual_image_name;
		$size=$_FILES['rc']['size'];
		$tmp=$_FILES['rc']['tmp_name'];
		$ext=explode(".",$actual_image_name);
		if(in_array($ext[1],$valid_formats))
		{
			if(move_uploaded_file($tmp,$path.$reimg))
			{
				if($auth_user->insertrc1($reimg,$user_id,$vid))
				{
					echo "success";
				}
				else
				{
					echo "not inserted";
				}
			}
			else
			{
				echo "not uploaded";
			}
		}
		else
		{
			echo "Invalid format";
		}
	}
	
?>