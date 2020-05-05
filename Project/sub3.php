<!-- This class retrieves value depending on users choice in 'sub2.php'-->
<?php
include('include/config.php');
session_start();
$_SESSION['id3']=$_GET['id'];
$id=$_SESSION['id3'];
 $sql = "SELECT * from levelitem where	id='$id'";
                    $query = $conn->query($sql);
                    $row = $query->fetch_assoc();
$_SESSION['sub3']=$row['choiceText'];
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
		<div class="m1 active b">
		<h2><?php echo $_SESSION['sub3']; ?></h2>
		</div>
		
	</div>
	<div class="head1 b" align="center"><h2><?php echo $_SESSION['sub3']; ?></h2></div>
	<div class="main-content">
		
		<?php
                    $sql1 = "SELECT * from levelitem where	parentId='$id'";
                    $query1 = $conn->query($sql1);
			     $num=mysqli_num_rows($query1);


			     if($num>0)
			{ ?>
			
		<div class="content" style="background-color: white; overflow: auto;" id="tb1">

		<table align="left" width="100%">
		<tr>
			<th><h2>&nbsp;&nbsp;&nbsp;QUESTIONS</h2></th>
		</tr>
		<?php

        while($row1 = $query1->fetch_assoc()){ ?>
                    
			<tr>
				<td><a href="sub4.php?id=<?php echo $row1['id']; ?>"><h4><?php echo $row1['choiceText']; ?></h4></a></td>

			</tr>
	<?php } ?>
			
			</table>
		</div>
		<?php	}
			else 
			{?>
				<br>
				<div class="mess"><h3 align="center">Sorry, there are no questions.</h3></div>
			
		
		<div class="main-content">
		<!-- links to the question class so users can ask questions-->
			
			<h2 align="center">Not happy with the results?</h2>
			<center><button ><a href="qus1.php">send a question</a></button></center>
			
		</div>
		<?php }?>
			<div class="back-b">
<a href="sub2.php?id=<?php echo $_SESSION['id2']; ?>"><img src="img/arrow.png" height="50px" width="100px"></a>
			
			
		</div>
	</div>
	
</div>
</body>
</html>
