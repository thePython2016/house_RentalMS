<?php
session_start();
use PHPMAILER\PHPMAILER\PHPMAILER;
use PHPMAILER\PHPMAILER\exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require 'dbConnection.php';
$sql = "select * from tenants where  email='$_POST[email]' OR '$_POST[email]'=''"; 
// $sql = "select * from members where   email = CASE WHEN $_POST[email] = 0 THEN email ELSE $_POST[email] END"; 

  
// Query for the making the connection. 
$res = mysqli_query($conn, $sql); 
if(isset($_POST['send']))
{



    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='infonet20th@gmail.com';
    $mail->Password='fmqv yead zvee bcaa';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('infonet20th@gmail.com');

  
if(mysqli_num_rows($res) > 0) { 
    while($x = mysqli_fetch_assoc($res)) { 
        $mail->addAddress($x['email']); 
 
    } 
  

    $mail->iSHTML(true);
    $mail->Subject=$_POST['subject'];
    $mail->Body=$_POST['message'];

    if(!$mail->send()) {


        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        date_default_timezone_set('Africa/Nairobi');

        $date=date('Y-m-d H:i:s');
        $id=$_POST['id'];
        
        $sender=$_POST['sender'];
        $receiver=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $insertSentmessage=mysqli_query($conn,"insert into sent(message_id,date,sender,receiver,subject,message)
                
        values('$id','$date','$sender','$receiver','$subject','$message')");
        $_SESSION['message']="<p style='color:grey;font-size:14px;margin-left:200px;font-weight:bold'>Your Message has been sent</p>";
        echo "<script>
        window.location.href='message.php'
        </script>";

    }
}
}
?>


