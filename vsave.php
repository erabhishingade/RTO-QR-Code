<?php
	require_once("lockc.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$v_type=$_POST['vtype'];
		$v_name=$_POST['vname'];
		$v_no=$_POST['vno'];
		$chesseno=$_POST['chesseno'];
		$u_id=$uid;
		if($auth_user->vnocheck($v_no) && $auth_user->svnocheck($v_no))
		{
			if($auth_user->vedit($v_type, $v_name, $v_no, $chesseno,$u_id))
			{
				$f=2;
				if($auth_user->updatedflag($u_id,$f))
				{
					echo "success";
				}
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