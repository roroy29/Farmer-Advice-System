<?php
session_start();
error_reporting(0);
include("../include/config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers Advice System</title>
<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<div class="wrapper">

	<div class="s_menu b">
		<div class="men b">
		<h2>MENU</h2>
		</div>
	
		<div class="m1 b">
		<h2>Home</h2>
		</div>
		<div class="m1  b">
		<a href="main.php"</a><h2>Questions</h2>
		</div>
		<div class="m1 active b">
		<h2>UNANSWERED</h2>
		</div>
		
	</div>
	<div class="logout">
	<button class="sub"><a href="logout.php">Logout</a></button>
</div>
	<div class="main-content">
		
	<div class="content" style="background-color: white; overflow: auto;" id="tb1">
		
		<table align="left" width="100%">
		
			
		<tr>
			<th><h2>&nbsp;&nbsp;&nbsp;QUESTIONS</h2></th>
		</tr>
		<?php
                    $sql1 = "SELECT * from questions where answer is NULL";
                    $query1 = $conn->query($sql1);
			$num=mysqli_num_rows($query1);
			if($num<1)
			{
			?>
				<tr>
				<td><h3>No Record Found!!!</h3></td>

			</tr>
			<?php }
			
			else
			{
			while($row1 = $query1->fetch_assoc()){ ?>
		<tr>
            <td><a href="reply.php?id=<?php echo $row1['id']; ?>"><h4><?php echo $row1['question']; ?></h4></a></td>

			</tr>
			<?php }
			}?>
			

			
			</table>
			
		</div>
		<div class="back-bt">
			<a href="main.php"><img src="../img/arrow.png" height="50px" width="100px"></a>
		</div>
	</div>
	
</div>
</body>
</html>
