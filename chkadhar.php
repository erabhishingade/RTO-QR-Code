<?php 
require_once("userclass.php");
		$auth_user= new USER();
if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$adharno=$_POST['adhar'];
		$count=$auth_user->chkadhar($adharno);
		if($count>=1)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}
 ?>