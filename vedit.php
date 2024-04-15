<?php
	require_once("lockc.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$vtype=$_POST['vtype'];
		$vname=$_POST['vname'];
		$vno=$_POST['vno'];
		$chesseno=$_POST['chesseno'];
		$id=$uid;
		if($auth_user->vnocheck($vno) && $auth_user->svnocheck($vno))
		{
			if($auth_user->vedit($vtype,$vname,$vno,$chesseno,$id))
			{	
				echo "success";
			}
			else
			{
				echo "enter again";
			}
		}
		else
		{
			echo "Vehicle no exists";
		}
	}
?>