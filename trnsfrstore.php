<?php
	require_once("lockc.php");
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$vnumber=$_POST['vnumber'];
		$adharnumber=$_POST['adharno'];
		$dt=$_POST['dt']; 
		$oauth=md5($uid.$vnumber.$adid);	
		$base=$oauth."-".$uid;
		$auth=base64_encode($base);
		if($seuid=$auth_user->getseuid($adharnumber))
		{
			$id=$seuid['u_id'];
			//echo $uid;
			if($auth_user->transfer($uid,$dt,$vnumber,$id,$adharnumber))
			{      
				//echo "success";
				if($vnumber==$vehicleno)  // 1st
				{
					if($auth_user->chksuserV($id))  //1st,1st done
					{
						//echo "succ";					
						if($auth_user->deleteid($id) && $auth_user->updatevehicle($vnumber,$id)) // $auth_user->insertvehicleU1($uid) vehicle blank id delete
						{
							$adharm="";
							$licensem="";
							$rcm="";
							$pucm="";
							$insum="";
							$fs1=1;
							$fs2=2;
							$ff1=5;
							$ff2=5;
							if($auth_user->updatevehidocsU1($rcm,$pucm,$insum,$uid))
							{ 
								if($auth_user->updateUflags($fs1,$fs2,$id) && $auth_user->updateUflags($ff1,$ff2,$uid))
								{
									if($auth_user->deleteqr($auth))
									{
										echo "success";
										header("Location:transfer.php");
									}
								}
								else
								{
									echo "flags not updated";
									header("Location:transfer.php");
								}
							}
							else
							{
								echo "docs not updated";
								header("Location:transfer.php");
							}
						}
						else
						{
							echo "vehicle not updated";
							header("Location:transfer.php");
						}
					}
					else  //1st,2nd done
					{
						$fs1=1;
						$fs2=0;
						$ff1=5;
						$ff2=5;
						$vtypem="";
						$vnamem="";
						$vnumberm="";
						$chessenom="";
						$rcm="";
						$pucm="";
						$insum="";
						if($auth_user->InsertSV($id,$vtype,$vname,$vnumber,$chesseno,$fs1,$fs2))
						{
							if($auth_user->updateV($uid,$vtypem,$vnamem,$vnumberm,$chessenom) && $auth_user->updatevehidocsU1($rcm,$pucm,$insum,$uid) && $auth_user->updateUflags($ff1,$ff2,$uid) && $auth_user->deleteqr($auth))
							{
								header("Location:transfer.php");
							}
							else
							{
								echo "V not updated";
								header("Location:transfer.php");
							}
						}
						else
						{
							echo "scv not inserted";
							header("Location:transfer.php");
						}							
					}
				}
				elseif($auth_user->scvnochk($vnumber)) // 2nd
				{
					if($auth_user->chksuserSV($id))// 2nd,2nd done
					{
						//echo "hello";
						$adharm="";
						$lichensem="";
						$rcm="";
						$pucm="";
						$insum="";
						$f1=1;
						$f2=0;
						if($auth_user->updatescvehicle($id,$licensem,$rcm,$pucm,$insum,$f1,$f2,$vnumber))
						{
							if($auth_user->deleteqr($auth))
							{
								echo "success";
								header("Location:transfer.php");
							}
						}
						else
						{
							echo "not found";
							header("Location:transfer.php");
						}
					}	
					else   //2nd,1st
					{ 
						$f1=1; 
						$f2=2;
						$secuser=$auth_user->fetchsv($vnumber);
						$vtypem=$secuser['v_type'];
						$vnamem=$secuser['v_name'];
						$vnumberm=$secuser['v_no'];
						$chessenom=$secuser['chesseno'];
						if($auth_user->UpdateVU2($vtypem,$vnamem,$vnumberm,$chessenom,$id))
						{
							if($auth_user->dltSV($uid) && $auth_user->updateUflags($f1,$f2,$id)&& $auth_user->deleteqr($auth))
							{
								header("Location:transfer.php");
							}
						} 
						else
						{
							echo "user vehi not updated";
							header("Location:transfer.php");
						}
					}
				}
				else
				{
					echo "vehicle not found";
					header("Location:transfer.php");
				}
			}
			else
			{
				echo "Not transfered !!";
				header("Location:transfer.php");
			}
		} 
		else
		{
			echo "user not found";
			header("Location:transfer.php");
		}
	}
?>