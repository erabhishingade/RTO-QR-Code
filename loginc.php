<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
	 mysql_select_db("flip",$con) or die(mysql_error());
	 
if((isset($_COOKIE['c_user']))&& isset($_COOKIE['c_salt']))
{
	header("location:userc.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST['username'] && $_POST['password'])
	{
		$myusername=mysql_real_escape_string($_POST['username']);
		$mypassword=mysql_real_escape_string($_POST['password']);
		$password=md5($mypassword);
		$sql=mysql_query("SELECT * FROM admin WHERE a_user='$myusername'");
		$user=mysql_fetch_array($sql);
		if($user=='0')
		{
			echo "ERROR!!!";
		}
		else if($user['a_pass']!=$password)
		{
			echo "ERROR!!!";
		}
		else
		{
			$salt=hash("sha512",rand().rand().rand());
			setcookie("c_user",hash("sha512",$myusername),strtotime('+30 days'),'/');
			setcookie("c_salt",$salt,strtotime('+30 days'),'/');
			$ad_id=$user['a_id'];
			mysql_query("UPDATE admin SET salt='$salt' WHERE a_id='$ad_id'");
			header("location:userc.php");
		}
	}
}
?>
<html>
	<body>
		<div class="login-form">
			<form action="" method="POST">
				<input type="text" id="username" name="username" value="" placeholder="username">
				<input type="password" class="text" id="password" name="password" value="" placeholder="password">
				<input type="submit" value="login">
			</form>
		</div>
	</body>
</html>
</html>