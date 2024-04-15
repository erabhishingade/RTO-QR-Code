<?php require_once("lockc.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		
		$vtype=$_POST['vtype'];
		$vname=$_POST['vname'];
		$vno1=$_POST['vno'];
		$chesseno=$_POST['chesseno'];
		$id=$uid;
		$oldvno=$no;
		if($auth_user->vnocheck($vno1) && $auth_user->svnocheck($vno1))
		{
			if($auth_user->svedit($vtype,$vname,$vno1,$chesseno,$id,$oldvno))
				{
					echo "success";
				}
				else
				{	
					echo "Enter again";
				}
			
		}
		else
		{
			echo "Vehicle no exists";
		}
	}
?>