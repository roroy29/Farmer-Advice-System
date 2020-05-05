<!-- This class retrieves value depending on users choice in 'sub1.php'-->
<?php
include('include/config.php');
session_start();
$_SESSION['id2']=$_GET['id'];
$id=$_SESSION['id2'];
 $sql = "SELECT * from levelitem where	id='$id'";
                    $query = $conn->query($sql);
                    $row = $query->fetch_assoc();
$_SESSION['sub2']=$row['choiceText'];
$pid=$row['id'];
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
                <h2><?php echo $_SESSION['sub1'];?> </h2>
        </div>

		<div class="m1 active b">
		<h2><?php echo $_SESSION['sub2']; ?></h2>
		</div>
		
	</div>
	<div class="head1 b" align="center"><h2><?php echo $_SESSION['sub2']; ?></h2></div>
	<div class="main-content">

		<div class="content">
		
		<table align="center">
		<tr>



		<?php
        //displays all the final subcategory's of 'sub1' before the questions

			$count=1;
        if($id==23) {
            $sql1 = "SELECT * from levelitem where	parentId=23";
            }
        elseif ($id==69){
            $sql1 = "SELECT * from levelitem where	parentId=69";
        }
        elseif ($id==3){
            $sql1 = "SELECT * from levelitem where	parentId=3";
        }
        elseif ($id==101){
            $sql1 = "SELECT * from levelitem where	parentId=101";
        }
        elseif ($id==138){
            $sql1 = "SELECT * from levelitem where	parentId=138";
        }
        elseif ($id==167){
            $sql1 = "SELECT * from levelitem where	parentId=167";
        }
        elseif ($id==189){
            $sql1 = "SELECT * from levelitem where	parentId=189";
        }
        elseif ($id==211){
            $sql1 = "SELECT * from levelitem where	parentId=211";
        }
        elseif ($id==252){
            $sql1 = "SELECT * from levelitem where	parentId=252";
        }
        elseif ($id==232){
            $sql1 = "SELECT * from levelitem where	parentId=232";
        }
        elseif ($id==270){
            $sql1 = "SELECT * from levelitem where	parentId=270";
        }
        elseif ($id==317){
            $sql1 = "SELECT * from levelitem where	parentId=317";

        }
        elseif ($id==330){
            $sql1 = "SELECT * from levelitem where	parentId=330";
        }
        elseif ($id==347){
            $sql1 = "SELECT * from levelitem where	parentId=347";
        }
        elseif ($id==373){
            $sql1 = "SELECT * from levelitem where	parentId=373";
        }
        elseif ($id==391){
            $sql1 = "SELECT * from levelitem where	parentId=391";
        }
        elseif ($id==415){
            $sql1 = "SELECT * from levelitem where	parentId=415";
        }

        //below displays the final subcategories for animals
        else
        {
            $sql1 = "SELECT * from levelitem where	parentId=3";
        }
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){
						if($count<=2)
						
						{
			 ?>
				<td><button class="mbtn"><a href="sub3.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['choiceText']; ?></a></button></td>

		<?php
                            $count++;
						}else
					{
						$count=2;
						?>
						</tr><tr>
						<td><button class="mbtn"><a href="sub3.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['choiceText']; ?></a></button></td>
						<?php

					}
					}

			if($count==1)
			{
				echo("<td></td></tr>");
			}
			if($count==2)
			{
				echo("</tr>");
			}

			?>
			
		</table>
			
		</div>
		<div class="back-bt">
			<a href="sub1.php?id=<?php echo $_SESSION['id1']; ?>"><img src="img/arrow.png" height="50px" width="100px"></a>
		</div>
	</div>
	
</div>
</body>
</html>
