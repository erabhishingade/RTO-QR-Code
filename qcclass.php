<?php 
	require_once('dbconfig.php');
	class QC
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
		public function doLoginqc($qcname,$qcmail,$qcpass)
		{
			try
			{
				echo "manali";
				$stmt=$this->con->prepare("SELECT * FROM qc WHERE qc_name=:qcname OR e_mail=:qcmail");
				$stmt->execute(array(':qcname'=>$qcname,':qcmail'=>$qcmail));
				$qcRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowcount()==1)
				{
					if(password_verify($qcpass,$qcRow['qc_pass']))
					{
						
						//$_COOKIE['c_user']=$qcRow['a_id'];
						$salt=hash("sha512",rand().rand().rand());
						setcookie("qc_user",hash("sha512",$qcname),strtotime('+30 days'),'/');
						setcookie("qc_salt",$salt,strtotime('+30 days'),'/');
						$qc_id=$qcRow['qc_id'];
						return array("qc_id"=>$qc_id, "salt"=>$salt);
						
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
		public function is_loggedin()
		{
			if(isset($_COOKIE['qc_user'])&& isset($_COOKIE['qc_salt']))
			{
				return true;
			}
		}
		public function updatesalt($qcid,$salt)
		{
			try
			{
				$stmt=$this->con->prepare("UPDATE qc SET sc_salt=:salt WHERE qc_id=:qcid");
				$stmt->bindparam(":salt",$salt);
				$stmt->bindparam(":qcid",$qcid);
				$stmt->execute();
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage;
			}
		}
	}
?>