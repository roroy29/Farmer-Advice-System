<?php 
include('include/config.php');
session_start();
// these sessions are used by classes to store and manipulate what the user clicked on and display the next set of categories
$_SESSION['id1']="";
$_SESSION['id2']="";
$_SESSION['id3']="";
$_SESSION['sub1']="";
$_SESSION['sub2']="";
$_SESSION['sub3']="";

?>
<!DOCTYPE html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Farmers Advice System</title>
<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="wrapper" style="text-align: center">
	<h1 align="center">CHOOSE A CATEGORY
</h1>

	<table align="center">


	 <?php
     //retrieving the top hierarchical categories
                    $sql = "SELECT * from levelitem where	parentId=1";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){ ?>

	<!-- displaying the retrieved data by text in order of its id -->
    <tr>
		<td colspan="2"><button class="catbtn"><a href="sub1.php?id=<?php echo $row['id']; ?>"><?php echo $row['choiceText']; ?></a></button></td>
	</tr>
	
	<?php  } ?>
	</table>

    <button id="aboutbtn" class="float-left submit-button" >ABOUT US</button>

    <script type="text/javascript">
        document.getElementById("aboutbtn").onclick = function () {
                location.href = "about.php";
            }
</script>

	</div>
</body>
</html>
