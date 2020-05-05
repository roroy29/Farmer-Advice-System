<!-- This class retrieves the answers for questions clicked by users choice in 'sub3.php'-->
<?php
include('include/config.php');
session_start();
$id=$_GET['id'];

 $sql = "SELECT * from levelitem where	id='$id'";
                    $query = $conn->query($sql);
                    $row = $query->fetch_assoc();
$ans=$row['answerText'];
$qus=$row['choiceText'];
$pid=$row['parentId'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers Advice System</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<!--shows the tree menu-->

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
		<div class="m1 active b">
		<h2>Questions</h2>
		</div>
		
	</div>
	<div class="head1 b" align="center"><h2>Question</h2></div>
	<div class="main-content">
		
		<div class="content">
		<div class="qus">
		
		<h1 align="center"><?php echo $qus; ?></h1>
		<h3><?php echo $ans; ?></h3>

			</div>
            <h2 align="center">Not happy with the results?
            </h2>
            <center><button style="width: auto; font-size: x-large" ><a href="qus1.php">send a question</a></button></center>
		</div>
		<div class="back-b">



            <a href="sub3.php?id=<?php echo $_SESSION['id3']; ?>"><img src="img/arrow.png" height="50px" width="100px"></a>
			
		</div>
	</div>
	
</div>
</body>
</html>
