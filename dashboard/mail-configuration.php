<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'dbConnection.php';

if (!isset($_POST['send'])) {
    exit;
}

$emailFilter = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$sql = "SELECT * FROM tenants WHERE email='$emailFilter' OR '$emailFilter'=''";
$res = mysqli_query($conn, $sql);

if (!$res || mysqli_num_rows($res) === 0) {
    $_SESSION['message'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>No recipients found</p>";
    rentalScriptRedirect('message.php');
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'infonet20th@gmail.com';
    $mail->Password = 'fmqv yead zvee bcaa';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('infonet20th@gmail.com');

    while ($x = mysqli_fetch_assoc($res)) {
        if (!empty($x['email'])) {
            $mail->addAddress($x['email']);
        }
    }

    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'] ?? '';
    $mail->Body = $_POST['message'] ?? '';

    if (!$mail->send()) {
        $_SESSION['message'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Mail error: "
            . htmlspecialchars($mail->ErrorInfo) . '</p>';
        rentalScriptRedirect('message.php');
    }

    date_default_timezone_set('Africa/Nairobi');
    $date = date('Y-m-d H:i:s');
    $id = mysqli_real_escape_string($conn, $_POST['id'] ?? uniqid('mail'));
    $sender = mysqli_real_escape_string($conn, $_POST['sender'] ?? '');
    $receiver = $emailFilter;
    $subject = mysqli_real_escape_string($conn, $_POST['subject'] ?? '');
    $body = mysqli_real_escape_string($conn, $_POST['message'] ?? '');

    $insertSentmessage = mysqli_query(
        $conn,
        "INSERT INTO sent(message_id,date,sender,receiver,subject,message)
        VALUES('$id','$date','$sender','$receiver','$subject','$body')"
    );

    if ($insertSentmessage) {
        $_SESSION['message'] = "<p style='color:grey;font-size:14px;margin-left:200px;font-weight:bold'>Your message has been sent</p>";
        rentalScriptRedirect('message.php');
    }

    $_SESSION['message'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Sent but not saved: "
        . htmlspecialchars(rentalDbError($conn)) . '</p>';
    rentalScriptRedirect('message.php');
} catch (Exception $e) {
    $_SESSION['message'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Mail error: "
        . htmlspecialchars($e->getMessage()) . '</p>';
    rentalScriptRedirect('message.php');
}
