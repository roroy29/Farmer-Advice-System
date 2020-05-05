<!-- This class is for questions enquired if users cant find the question or answer they are looking for-->
<!-- this class is called after all the subcategories when user clicks on 'send a question'-->
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
		
		echo '<script type="text/javascript">alert("Some error occurred! Please, try again.")</script>';
		header('location: qus1.php');
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
<div class="wrapper">
	<div class="s_menu b">
		<div class="men b">
		<h2>MENU</h2>
		</div>
		<div class="m1 b">
		<h2><?php echo $_SESSION['sub1']; ?></h2>
		</div>
		<div class="m1 b">
		<h2><?php echo $_SESSION['sub2']; ?></h2>
		</div>
		<div class="m1 b">
		<h2><?php echo $_SESSION['sub3']; ?></h2>
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
		
	
		
			
<a href="sub2.php?id=<?php echo $_SESSION['id2']; ?>"><img src="img/arrow.png" height="50px" width="100px"></a>
			
			
	
			
		</div>
	</div>
	
</div>
</body>
</html>