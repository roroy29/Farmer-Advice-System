<!-- This class retrieves value depending on users choice in 'index.php'-->
<?php
include('include/config.php');
session_start();
$_SESSION['id1']=$_GET['id'];
$id=$_SESSION['id1'];
 $sql = "SELECT * from levelitem where	id='$id'";
                    $query = $conn->query($sql);
                    $row = $query->fetch_assoc();
$_SESSION['sub1']=$row['choiceText'];
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
		<div class="m1 active b">
		<h2><?php echo $_SESSION['sub1']; ?></h2>
		</div>
		
	</div>

	<div class="head1 b" align="center"><h2><?php echo $_SESSION['sub1'];?></h2></div>
	<div class="main-content">
		
		<div class="content" id="cont1">
		
		<table align="center" >


	 <?php
     //retrieving the second subcategory by the id of the first selected category

                    $sql1 = "SELECT * from levelitem where	parentId='$id'";
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){ ?>
	<tr>
		<td colspan="2"><button class="mbtn"><a href="sub2.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['choiceText']; ?></a></button></td>
	</tr>
	
	<?php  } ?>
	</table>
	
			
		</div>
		<div class="back-bt">
			<a href="index.php"><img src="img/arrow.png" height="50px" width="100px"></a>
		</div>
	</div>
	
</div>
</body>
</html>
