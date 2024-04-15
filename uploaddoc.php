<?php
	require_once("lockc.php");
	function getextension($str)
	{
		$pos=strpos($str,".");
		if(!$pos)
		{
			return "";
		}
		$l=strlen($str)-$pos;
		$ext=substr($str,$pos+1,$l);
		return $ext;
	}
	$user_id=$uid;
	$stmt=$auth_user->runQuery("SELECT * FROM user WHERE u_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	$path="uploads/";
	$valid_formats=array("pdf");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$adhar=$_FILES['adhar']['name'];
		$license=$_FILES['license']['name'];
		$rc=$_FILES['rc']['name'];
		$puc=$_FILES['puc']['name'];
		$insurance=$_FILES['insurance']['name'];
		$time=time();
		$adhar1=$time.$adhar;
		$license1=$time.$license;
		$rc1=$time.$rc;
		$puc1=$time.$puc;
		$insurance1=$time.$insurance;
		$tmp1=$_FILES['adhar']['tmp_name'];
		$tmp2=$_FILES['license']['tmp_name'];
		$tmp3=$_FILES['rc']['tmp_name'];
		$tmp4=$_FILES['puc']['tmp_name'];
		$tmp5=$_FILES['insurance']['tmp_name'];
		$extadhar=getextension($adhar);
		$extlicense=getextension($license);
		$extrc=getextension($rc);
		$extpuc=getextension($puc);
		$extinsurance=getextension($insurance);
		if(in_array($extadhar,$valid_formats) && in_array($extlicense,$valid_formats) && in_array($extrc,$valid_formats) && in_array($extpuc,$valid_formats) && in_array($extinsurance,$valid_formats) )
		{
			$f=0;
			if(move_uploaded_file($tmp1,$path.$adhar1))
			{
				if($fl_user->insertadhar($adhar1,$user_id))
				{
					$f=$f+1;
					continue;
				}
				else
				{
					echo "not";
				}
			}
			if(move_uploaded_file($tmp2,$path.$license1))
			{
				if($fl_user->insertlicense($license1,$user_id))
				{
					$f=$f+1;
					continue;
				}
				else
				{
					echo "not";
				}
			}
			if(move_uploaded_file($tmp3,$path.$rc1))
			{
				if($fl_user->insertrc($rc1,$user_id))
				{
					$f=$f+1;
					continue;
				}
				else
				{
					echo "not";
				}
			}
			if(move_uploaded_file($tmp4,$path.$puc1))
			{
				if($fl_user->insertpuc($puc1,$user_id))
				{
					$f=$f+1;
					continue;
				}
				else
				{
					echo "not";
				}
			}
			if(move_uploaded_file($tmp2,$path.$insurance1))
			{
				if($fl_user->insertinsurance($insurance1,$user_id))
				{
					$f=$f+1;
					continue;
				}
				else
				{
					echo "not";
				}
			}
			if($f==5)
			{
				echo "success";
			}
			
		}
	}
?>