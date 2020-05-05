
<!-- This class is for questions enquired in about page-->
<?php
include('include/config.php');
session_start();
if(isset($_POST['submit'])){
		$email= $_POST['email'];
	$message = $_POST['message'];
    $sql = "INSERT INTO questions (question,email) VALUES ('$message','$email')";
	
	if($conn->query($sql)){
		header('location: suc.html');
	}
	else
	{
	echo '<script type="text/javascript">alert("There are some error occur! Please, try again.")</script>';	
		header('location: qus.php');
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers Advice System</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- shows the tree menu -->
<div class="wrapper">
	<div class="s_menu b">
		<div class="men b">
		<h2>MENU</h2>
		</div>
		<div class="m1 b">
		<h2>Questions</h2>
		</div>
		
	</div>
	<div class="head1 b" align="center"><h2>SEND A QUESTION</h2></div>
	<div class="main-content">
		
		<div class="content">
		<form method="post" >
				<h3>Your email address :</h3>

				<input type="email" name="email" class="email" required required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				<br>
				<h3>Your question:</h3>
				<textarea name="message" required></textarea>
					<br>
				<input type="submit" name="submit" value="submit" class="sbtn">
			</form>
		</div>
		<div class="back-b">
            <input type="image" src="img/arrow.png" alt="Back Button" width="50" onclick="history.go(-1);" value="Back">

		</div>
	</div>
	
</div>


</body>

</html>
