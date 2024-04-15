<?php
	require_once("userclass.php");
	$user=new USER();
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$uname=$_POST['uname'];
		$umail=$_POST['umail'];
		$pass=$_POST['pass'];
		$contact=$_POST['contact'];
		$adhar=$_POST['adhar'];
		$address=$_POST['address'];
		$adid=$_POST['pin'];
		$licenseno=$_POST['licenseno'];
		if($user->check($uname,$umail))
		{
			if($pin=$user->getadpin($adid))
			{
				$tm = time(); 
				$u_flag=1;
				$d_flag=1;
				if($uid=$user->register($adid,$uname,$umail,$pass,$contact,$adhar,$address,$pin,$licenseno,$u_flag,$d_flag,$tm))
				{
					//echo $uid;
					if($user->insrtuidV($uid) && $user->insrtuidD($uid))
					{
						echo "success";
					}
				}
				else
				{
					echo "enter again";
				}
			}
		}
		else{
			echo "email or username exists";
		}
	}
?>