<?php 
require_once("userclass.php");
		$auth_user= new USER();
if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$contactno=$_POST['contact'];
		$count=$auth_user->chkno($contactno);
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