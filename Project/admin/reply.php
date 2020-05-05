<?php
session_start();
include("../include/config.php");
$id=$_GET['id'];
$sql = "SELECT * from questions where	id='$id'";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$qus=$row['question'];
$email=$row['email'];
if(isset($_POST["submit"])){
    $message = $_POST["message"];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $email = filter_var($email, FILTER_VALIDATE_EMAIL);


// Updating Answer
    mysqli_query($conn,
        "update questions set answer='$message' where id ='$id';");

    $output = 'MIME-Version: 1.0' . "\r\n";
    $output .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $output='<p>Dear user,</p>';
    $output.='<p>Thank you for inquiring!. Your Query Has been Answered!</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Your Question was:'.$qus.'</p>';
    $output.='<p>Answer: '.$message.'</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>If you need more assistance, please do contact us again.</p>';
    $output.='<p>Thanks again for your inquiry.</p>';
    $output.='<p>Farmers Advice System [G21]</p>';
    $body = $output;
    $subject = "Your Query Has been Answered!";

    require("PHPMailer/PHPMailerAutoload.php");
//require("PHPMailer/class.smtp.php");
//    require("PHPMailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host = "smtp.gmail.com"; // Enter your host here
    $mail->SMTPAuth = true;
    $mail->Username = "aberystudents@gmail.com"; // Enter your email here
    $mail->Password = "farmeradvicesystem"; //Enter your password here
    $mail->Subject = $subject;

    $mail->IsHTML(true);
    $mail->AddAddress("$email", "recipient-name");
    $mail->SetFrom("aberystudents@gmail.com", "Farmers Advice System");
    $mail->AddReplyTo("aberystudents@gmail.com", "reply-to-name");
    $mail->AddCC("", "cc-recipient-name");

    $mail->MsgHTML($body);
    if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo '<script type="text/javascript">alert("An email has been sent to the registered email!!!");</script>';
        header('location: unans.php');
    }

}




?>

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
            <h2>Question</h2>
        </div>
        <div class="m1 b">
            <h2>UNANSWERED</h2>
        </div>

    </div>
    <div class="logout">
        <button class="sub"><a href="logout.php">Logout</a></button>
    </div>
    <div class="main-content">

        <div class="content">
            <h2>The Question:</h2>
            <div class="replyque"><?php echo "$qus"; ?></div>
            <form method="post" >

                <h3>Answer:</h3>
                <textarea name="message" required></textarea>
                <br>
                <input type="submit" name="submit" value="submit" class="sbtn">
            </form>
        </div>
        <div class="back-b">




            <a href="unans.php"><img src="../img/arrow.png" height="50px" width="100px"></a>




        </div>
    </div>

</div>
</body>
</html>
