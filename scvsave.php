<?php
	require_once("lockc.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$v_type=$_POST['vtype'];
		$v_name=$_POST['vname'];
		$v_no=$_POST['vno'];
		$chesseno=$_POST['chesseno'];
		$f1=1;
		$f2=0;
		if($auth_user->vnocheck($v_no) && $auth_user->svnocheck($v_no))
		{
			if($auth_user->scvedit($uid, $v_type, $v_name, $v_no, $chesseno, $f1, $f2))
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