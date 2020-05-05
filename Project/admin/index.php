<?php
session_start();
error_reporting(0);
include("../include/config.php");
if(isset($_POST['submit']))
{
	$ret=mysqli_query($conn,"SELECT * FROM admin WHERE loginid='".$_POST['id']."' and password='".($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="main.php";//
$_SESSION['admin'] =$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid email or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers Advice System</title>
<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<div class="wrapper" >

<div class="login">
	<form action="" method="post"  >

		<table align="center">
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGIN </td>

			</tr>
			<tr align="center">
			<td>	<input type="text" name="id" required>
		
			</td>
				</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PASSWORD</td>
				
			</tr>
			<tr align="center">
			<td>	<input type="password" name="password" required>
			
			</td></tr>
			<tr>
				<td>
					 <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
			
				<td>
					<input type="submit" value="LOGIN" name="submit" class="sub" >
				</td>
			</tr>
		</table>
	</form>
</div>
	
	
</div>
</body>
</html>
