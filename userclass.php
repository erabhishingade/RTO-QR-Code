<?php
	require_once('dbconfig.php');
	class USER
	{
		private $con;
		public function __construct()
		{
			$database=new Database();
			$db=$database->dbconnection();
			$this->con=$db;
		}
		public function runQuery($sql)
		{
			$stmt=$this->con->prepare($sql);
			return $stmt;
		}
		public function getpins()
		{
			try
			{
				$stmt=$this->con->prepare("SELECT ad_id,ad_pin,ad_uname FROM admin");
				$stmt->execute();
				$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function check($uname,$umail)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM user WHERE u_name=:uname OR u_email=:umail");
			$stmt->execute(array(':uname'=>$uname,':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowcount()==1)
			{
				return false;
			}
			else
			{
				return true;
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function getadpin($adid)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT ad_pin FROM admin WHERE ad_id=:adid");
				$stmt->execute(array(':adid'=>$adid));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow['ad_pin'];
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function register($adid,$uname,$umail,$pass,$contact,$adhar,$address,$pin,$licenseno,$u_flag,$d_flag,$tm)
		{
			try
			{
				$f=1;
				$new_password=password_hash($pass,PASSWORD_DEFAULT);
				$stmt=$this->con->prepare("INSERT INTO user(ad_id,u_name,u_email,u_pass,u_contact,u_adharno,u_address,u_pin,licenseno,u_flag,d_flag,u_time,u_salt) VALUES(:adid,:username,:uemail,:upass,:contact,:adhar,:address,:pin,:licenseno,:u_flag,:d_flag,:time, 11)");
				$stmt->bindparam(":adid",$adid);
				$stmt->bindparam(":username",$uname);
				$stmt->bindparam(":uemail",$umail);
				$stmt->bindparam(":upass",$new_password);
				$stmt->bindparam(":contact",$contact);
				$stmt->bindparam(":adhar",$adhar);
				$stmt->bindparam(":address",$address);
				$stmt->bindparam(":pin",$pin);
				$stmt->bindparam(":licenseno",$licenseno);
				$stmt->bindparam(":u_flag",$u_flag);
				$stmt->bindparam(":d_flag",$d_flag);
				$stmt->bindparam(":time",$tm);
				$stmt->execute();
				$last=$this->con->lastInsertId();
				return $last;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	
		public function insrtuidV($uid)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO vehicle(u_id) VALUES(:uid)");
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insrtuidD($uid)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO document(u_id) VALUES(:uid)");
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updatesalt($uid,$salt)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE user SET u_salt=:salt WHERE u_id=:uid");
				$stmt->bindparam(":salt",$salt);
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function redirect($url)
		{
			header("Location:$url");
		}
		public function doLogin($uname,$umail,$upass)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT * FROM user WHERE u_name=:uname OR u_email=:umail");
				$stmt->execute(array(':uname'=>$uname,':umail'=>$umail));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowcount()==1)
				{
					if(password_verify($upass,$userRow['u_pass']))
					{
						
						//$_COOKIE['c_user']=$userRow['a_id'];
						$salt=hash("sha512",rand().rand().rand());
						setcookie("u_user",hash("sha512",$uname),strtotime('+30 days'),'/');
						setcookie("u_salt",$salt,strtotime('+30 days'),'/');
						$u_id=$userRow['u_id'];
						return array("u_id"=>$u_id, "salt"=>$salt);
						
					}
					else
					{
						return false;
					}
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function dologout()
		{
				$auser = $_COOKIE['c_user'];
				$salt = $_COOKIE['c_salt'];
				setcookie("u_user",$auser, time()- 24 * 60 * 60,"/");
				setcookie("u_salt",$salt, time()- 24 * 60 * 60,"/");
				return true;
			
		}
		public function is_loggedin()
		{
			if(isset($_COOKIE['u_user'])&& isset($_COOKIE['u_salt']))
			{
				return true;
			}
		}
		public function fetchflag($salt)
		{
			try
			
			{
				$stmt=$this->con->prepare("SELECT * FROM user WHERE u_salt=:salt");
				$stmt->execute(array(':salt'=>$salt));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function chkuser($salt)
		{
			try
			
			{
				$stmt=$this->con->prepare("SELECT * FROM user WHERE u_salt=:salt");
				$stmt->execute(array(':salt'=>$salt));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		// lock function
		public function chkuserv($salt)
		{
			try
			
			{
				$stmt=$this->con->prepare("SELECT u.*,v.*,d.* FROM user u, vehicle v, document d WHERE u.u_id=v.u_id AND u.u_id=d.u_id AND u.u_salt=:salt");
				$stmt->execute(array(':salt'=>$salt));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchlink($uid)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT * FROM qr WHERE u_id=:uid");
				$stmt->execute(array(':uid'=>$uid));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		/*public function Vreg($u_id, $v_type, $v_name, $v_no, $chesseno)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO vehicle(u_id,v_type,v_name,v_no,chesseno) VALUES(:u_id,:v_type,:v_name,:v_no,:chesseno)");
				$stmt->bindparam(":uid",$uid);
				$stmt->bindparam(":v_type",$v_type);
				$stmt->bindparam(":v_name",$v_name);
				$stmt->bindparam(":v_no",$v_no);
				$stmt->bindparam(":chesseno",$chesseno);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		
			
		}*/
		public function vedit($vtype,$vname,$vno,$chesseno,$id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE vehicle SET v_type=:vtype,v_name=:vname,v_no=:vno,chesseno=:chesseno WHERE u_id=:uid");
				$stmt->bindparam(":vtype",$vtype);
				$stmt->bindparam(":vname",$vname);
				$stmt->bindparam(":vno",$vno);
				$stmt->bindparam(":chesseno",$chesseno);
				$stmt->bindparam(":uid",$id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function svedit($vtype,$vname,$vno,$chesseno,$id,$oldvno)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET v_type=:vtype,v_name=:vname,v_no=:vno,chesseno=:chesseno WHERE u_id=:id AND v_no=:oldvno");
				$stmt->bindparam(":vtype",$vtype);
				$stmt->bindparam(":vname",$vname);
				$stmt->bindparam(":vno",$vno);
				$stmt->bindparam(":chesseno",$chesseno);
				$stmt->bindparam(":id",$id);
				$stmt->bindparam(":oldvno",$oldvno);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function scvedit($uid, $v_type,$v_name,$v_no,$chesseno,$f1,$f2)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO sc_vehicle(u_id,v_type,v_name,v_no,chesseno,scv_flag,approve_flag) VALUES(:uid,:v_type,:v_name,:v_no,:chesseno,:f1,:f2)");
				$stmt->bindparam(":uid",$uid);
				$stmt->bindparam(":v_type",$v_type);
				$stmt->bindparam(":v_name",$v_name);
				$stmt->bindparam(":v_no",$v_no);
				$stmt->bindparam(":chesseno",$chesseno);
				$stmt->bindparam(":f1",$f1);
				$stmt->bindparam(":f2",$f2);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function scvdata($uid)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT * FROM sc_vehicle WHERE u_id=:uid AND approve_flag!=2");
				$stmt->execute(array(':uid'=>$uid));
				$vRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $vRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertlicense1($license1,$user_id,$vid)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET license=:license1 WHERE u_id=:user_id AND sc_vehiid=:vid");
				$stmt->bindparam(":license1",$license1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->bindparam(":vid",$vid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertrc1($rc1,$user_id,$vid)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET rc=:rc1 WHERE u_id=:user_id AND sc_vehiid=:vid");
				$stmt->bindparam(":rc1",$rc1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->bindparam(":vid",$vid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertpuc1($puc1,$user_id,$vid)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET puc=:puc1 WHERE u_id=:user_id AND sc_vehiid=:vid");
				$stmt->bindparam(":puc1",$puc1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->bindparam(":vid",$vid);
				$stmt->execute();
				return $stmt;	
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertinsurance1($insurance1,$user_id,$vid)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET insurance=:insurance1 WHERE u_id=:user_id AND sc_vehiid=:vid");
				$stmt->bindparam(":insurance1",$insurance1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->bindparam(":vid",$vid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updateSCf($vid,$f1,$f2)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET scv_flag=:f1,approve_flag=:f2 WHERE sc_vehiid=:vid");
				$stmt->bindparam(":f1",$f1);
				$stmt->bindparam(":f2",$f2);
				$stmt->bindparam(":vid",$vid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updatedflag($u_id,$f)
		{
			try{
				$stmt=$this->con->prepare("UPDATE user SET d_flag=:f WHERE u_id=:uid");
				$stmt->bindparam(":f",$f);
				$stmt->bindparam(":uid",$u_id);
				//$stmt->bindparam(":flag",$f);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertprof($reimg,$user_id)
		{
				$f=1;
				$stmt=$this->con->prepare("UPDATE user SET profile=:reimg WHERE u_id=:uid");
				$stmt->bindparam(":reimg",$reimg);
				$stmt->bindparam(":uid",$user_id);
				//$stmt->bindparam(":flag",$f);
				$stmt->execute();
				return $stmt;
		}
		public function fetchprofile($user_id)
		{
			$stmt=$this->con->prepare("SELECT profile FROM user WHERE u_id=:user_id");
			$stmt->execute(array(':user_id'=>$user_id));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow;
		}
		public function insertadhar($adhar1,$user_id)
		{
			try
			{
					$stmt=$this->con->prepare("UPDATE document SET adhar=:adhar1 WHERE u_id=:user_id");
					$stmt->bindparam(":adhar1",$adhar1);
					$stmt->bindparam(":user_id",$user_id);
					$stmt->execute();
					return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertlicense($license1,$user_id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE document SET license=:license1 WHERE u_id=:user_id");
				$stmt->bindparam(":license1",$license1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertrc($rc1,$user_id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE document SET RC=:rc1 WHERE u_id=:user_id");
				$stmt->bindparam(":rc1",$rc1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertpuc($puc1,$user_id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE document SET PUC=:puc1 WHERE u_id=:user_id");
				$stmt->bindparam(":puc1",$puc1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->execute();
				return $stmt;	
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function insertinsurance($insurance1,$user_id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE document SET insurance=:insurance1 WHERE u_id=:user_id");
				$stmt->bindparam(":insurance1",$insurance1);
				$stmt->bindparam(":user_id",$user_id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updatef($uid,$f1,$f2)
		{
			try
			{
				
				$stmt=$this->con->prepare("UPDATE user SET u_flag=:f1,d_flag=:f2 WHERE u_id=:uid");
				$stmt->bindparam(":f1",$f1);
				$stmt->bindparam(":f2",$f2);
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function edituserdetails($uname,$contact,$adhar,$address,$pin,$licenseno,$uid)
		{	
			try
			{
				$stmt=$this->con->prepare("UPDATE user SET u_name=:uname,u_contact=:contact,u_adharno=:adhar,u_address=:address,u_pin=:pin,licenseno=:licenseno WHERE u_id=:uid");
				$stmt->bindparam(":uname",$uname);
				$stmt->bindparam(":contact",$contact);
				$stmt->bindparam(":adhar",$adhar);
				$stmt->bindparam(":address",$address);
				$stmt->bindparam(":pin",$pin);
				$stmt->bindparam(":licenseno",$licenseno);
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function newvehi($uid)
		{
			try
			
			{
				$stmt=$this->con->prepare("SELECT u.*,sv.* FROM user u, sc_vehicle sv WHERE sv.u_id =u.u_id  AND sv.u_id=:uid");
				$stmt->execute(array(':uid'=>$uid));
				$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchsvdetails($vid)
		{
			try
			
			{
				$stmt=$this->con->prepare("SELECT u.*,v.* FROM user u, sc_vehicle v WHERE u.u_id =v.u_id AND sc_vehiid=:vid");
				$stmt->execute(array(':vid'=>$vid));
				$scRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $scRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchqrsc($vid)
		{
			try
			{
			$stmt=$this->con->prepare("select * FROM qr WHERE svid=:vid AND qr_flag=1");
			$stmt->execute(array(':vid'=>$vid));
		    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function vnocheck($v_no)
		{ 
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM vehicle WHERE v_no=:v_no");
			$stmt->execute(array(':v_no'=>$v_no));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowcount()==1)
			{
				return false;
			}
			else
			{
				return true;
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function svnocheck($v_no)
		{ 
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM sc_vehicle WHERE v_no=:v_no");
			$stmt->execute(array(':v_no'=>$v_no));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowcount()==1)
			{
				return false;
			}
			else
			{
				return true;
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchvnos1($uid)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT v_no FROM vehicle WHERE u_id=:uid");
			$stmt->execute(array(':uid'=>$uid));
			$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchvnos2($uid)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT v_no FROM sc_vehicle WHERE u_id=:uid");
			$stmt->execute(array(':uid'=>$uid));
			$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchusers($uid)
		{
			try
			{
				$f=1;
				$stmt=$this->con->prepare("SELECT u_id, u_adharno FROM user WHERE u_id!=:uid");
				$stmt->execute(array(':uid'=>$uid));
				//$stmt->execute(array(':f'=>$f));
				$userRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function getseuid($adharno)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT u_id FROM user WHERE u_adharno=:adharno");
				$stmt->execute(array(':adharno'=>$adharno));
				//$stmt->execute(array(':f'=>$f));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function transfer($uid,$dt,$vnumber,$seuid,$adharno)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO trans(u_id, sold_date, vehicle_no, se_uid, adharno) VALUES(:uid, :dt, :vnumber, :seuid, :adharno)");
				$stmt->bindparam(":uid",$uid);
				$stmt->bindparam(":dt",$dt);
				$stmt->bindparam(":vnumber",$vnumber);
				$stmt->bindparam(":seuid",$seuid);
				$stmt->bindparam(":adharno",$adharno);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updatevehicle($vnumber,$id)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE vehicle SET u_id=:id WHERE v_no=:vnumber");
				$stmt->bindparam(":id",$id);
				$stmt->bindparam(":vnumber",$vnumber);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function updatescvehicle($id,$license,$rc,$puc,$insu,$f1,$f2,$vnumber)
		{				
			try 
			{ 
				$stmt=$this->con->prepare("UPDATE sc_vehicle SET u_id=:id, license=:license, rc=:rc, puc=:puc, insurance=:insu, scv_flag=:f1, approve_flag=:f2 WHERE v_no=:vnumber");
				$stmt->bindparam(":id",$id);
				$stmt->bindparam(":license",$license);
				$stmt->bindparam(":rc",$rc);
				$stmt->bindparam(":puc",$puc);
				$stmt->bindparam(":insu",$insu);
				$stmt->bindparam(":f1",$f1);
				$stmt->bindparam(":f2",$f2);
				$stmt->bindparam(":vnumber",$vnumber);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function scvnochk($vnumber)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM sc_vehicle WHERE v_no=:vnumber");
			$stmt->execute(array(':vnumber'=>$vnumber));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowcount()==1)
			{
				return true;
			}
			else
			{
				return false;
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	
		public function updatevehidocsU1($rcm,$pucm,$insum,$uid)
		{				
			try 
			{ 
				$stmt=$this->con->prepare("UPDATE document SET rc=:rcm, puc=:pucm, insurance=:insum  WHERE u_id=:uid");
				$stmt->bindparam(":rcm",$rcm);
				$stmt->bindparam(":pucm",$pucm);
				$stmt->bindparam(":insum",$insum);
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function deleteqr($auth)
		{
			try
			{
				$stmt=$this->con->prepare("DELETE FROM qr WHERE outh=:auth");
				$stmt->bindparam(":auth",$auth);
				$stmt->execute();
				return $stmt; 
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function chksuserV($id)
		{
			try
			{
				$stmt=$this->con->prepare("SELECT v_no FROM vehicle WHERE u_id=:id");
				$stmt->execute(array(':id'=>$id));
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($userRow['v_no']=="")
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function chksuserSV($id)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM vehicle WHERE u_id=:id");
			$stmt->execute(array(':id'=>$id));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($userRow['v_no']=="")
			{
				return false;
			}
			else
			{
				return true;
			}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function updateUflags($f1,$f2,$id)
		{
			try 
			{
				$stmt=$this->con->prepare("UPDATE user SET u_flag=:f1, d_flag=:f2 WHERE u_id=:id");
				$stmt->bindparam(":f1",$f1);
				$stmt->bindparam(":f2",$f2);
				$stmt->bindparam(":id",$id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
		public function updateV($uid,$vtypem,$vnamem,$vnumberm,$chessenom)
		{				
			try
			{
				$stmt=$this->con->prepare("UPDATE vehicle SET v_type=:vtypem, v_name=:vnamem, v_no=:vnumberm, chesseno=:chessenom WHERE u_id=:uid");
				$stmt->bindparam(":uid",$uid);
				$stmt->bindparam(":vtypem",$vtypem);
				$stmt->bindparam(":vnamem",$vnamem);
				$stmt->bindparam(":vnumberm",$vnumberm);
				$stmt->bindparam(":chessenom",$chessenom);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function InsertSV($seid,$vtype,$vname,$vnumber,$chesseno,$fs1,$fs2)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO sc_vehicle(u_id, v_type, v_name, v_no, chesseno, scv_flag, approve_flag) VALUES(:seid, :vtype, :vname, :vnumber, :chesseno, :fs1, :fs2)");
				$stmt->bindparam(":seid",$seid);
				$stmt->bindparam(":vtype",$vtype);
				$stmt->bindparam(":vname",$vname);
				$stmt->bindparam(":vnumber",$vnumber);
				$stmt->bindparam(":chesseno",$chesseno);
				$stmt->bindparam(":fs1",$fs1);
				$stmt->bindparam(":fs2",$fs2);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function dltSV($uid)
		{
			try
			{
				$stmt=$this->con->prepare("DELETE FROM sc_vehicle WHERE u_id=:uid");
				$stmt->bindparam(":uid",$uid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function UpdateVU2($vtypem,$vnamem,$vnumberm,$chessenom,$id)
		{				
			try
			{
				$stmt=$this->con->prepare("UPDATE vehicle SET v_type=:vtypem, v_name=:vnamem, v_no=:vnumberm, chesseno=:chessenom WHERE u_id=:id");
				$stmt->bindparam(":vtypem",$vtypem);
				$stmt->bindparam(":vnamem",$vnamem);
				$stmt->bindparam(":vnumberm",$vnumberm);
				$stmt->bindparam(":chessenom",$chessenom);
				$stmt->bindparam(":id",$id);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		/*public function insertDoc($seid,$adhar,$license,$rc,$puc,$insu)
		{
			try
			{
				$stmt=$this->con->prepare("INSERT INTO document(u_id, adhar, license, rc, puc, insurance) VALUES(:seid, :adhar, :license, :rc, :puc, :insu)");
				$stmt->bindparam(":seid",$seid);
				$stmt->bindparam(":adhar",$adhar);
				$stmt->bindparam(":license",$license);
				$stmt->bindparam(":rc",$rc);
				$stmt->bindparam(":puc",$puc);
				$stmt->bindparam(":insu",$insu);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}*/
		public function deleteid($id)
		{
			try
			{
				$stmt=$this->con->prepare("DELETE FROM vehicle WHERE u_id=:id");
				$stmt->bindparam(":id",$id);
				$stmt->execute();
				return $stmt; 
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function fetchsv($vnumber)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM sc_vehicle WHERE v_no=:vnumber");
			$stmt->execute(array(':vnumber'=>$vnumber));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function chkno($contactno)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM user WHERE u_contact=:contactno");
			$stmt->execute(array(':contactno'=>$contactno));
			$count=$stmt->rowcount();
			return $count;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function chkadhar($adharno)
		{
			try
			{
			$stmt=$this->con->prepare("SELECT * FROM user WHERE u_adharno=:adharno");
			$stmt->execute(array(':adharno'=>$adharno));
			$count=$stmt->rowcount();
			return $count;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		
		public function fetchfine($uid)
		{
			try{
				$stmt=$this->con->prepare("SELECT f.*,fl.fldt FROM fine f,fineli fl WHERE f.fin_id=fl.fin_id AND fl.u_id=:uid");
				$stmt->execute(array(':uid'=>$uid));
				$getfine=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $getfine;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
	}
?>