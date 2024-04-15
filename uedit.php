<?php
	require_once("lockc.php");
	$u_id=$uid;
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$uname=$_POST['uname'];
		$contact=$_POST['contact'];
		$adhar=$_POST['adhar'];
		$address=$_POST['address'];
		$pin=$_POST['pin'];
		$licenseno=$_POST['licenseno'];
		if($auth_user->edituserdetails($uname,$contact,$adhar,$address,$pin,$licenseno,$u_id))
		{
			echo "success";
		}
		else
		{
			echo "enter again";
		}
	}
?>