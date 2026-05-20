<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbConnection.php';

function simplePhoneFromat($phones)
{
    $phone_formated = [];
    foreach ($phones as $ph) {
        $phone_formated[] = '255' . substr($ph, 1);
    }
    return implode(',', $phone_formated);
}

if (!isset($_POST['send'])) {
    exit;
}

$sender = mysqli_real_escape_string($conn, $_POST['sender'] ?? '');
$phones = $_POST['phone'] ?? [];
if (!is_array($phones)) {
    $phones = [$phones];
}
$subject = mysqli_real_escape_string($conn, $_POST['subject'] ?? '');
$message = mysqli_real_escape_string($conn, $_POST['message'] ?? '');
$phoneFormatted = simplePhoneFromat($phones);

$url = 'https://portal.zepsonsms.co.tz/api/v3/sms/send';
$token = '22|MefsVNsF0t9F47Mg9LKwMlClYjfczhbiadUrBUOe888d453b';
$data = [
    'recipient' => $phoneFormatted,
    'sender_id' => $sender,
    'type' => 'plain',
    'message' => $message,
];
$headers = [
    "Authorization: Bearer $token",
    'Content-Type: application/json',
    'Accept: application/json',
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_exec($ch);
$curlError = curl_errno($ch) ? curl_error($ch) : '';
curl_close($ch);

date_default_timezone_set('Africa/Nairobi');
$date = date('Y-m-d H:i:s');
$id = mysqli_real_escape_string($conn, $_POST['id'] ?? uniqid('sms'));
$receiver = mysqli_real_escape_string($conn, json_encode($phones));

$insertSentmessage = mysqli_query(
    $conn,
    "INSERT INTO sentSMS(message_id,date,sender,receiver,subject,message)
    VALUES('$id','$date','$sender','$receiver','$subject','$message')"
);

if ($insertSentmessage) {
    $_SESSION['message'] = "<p style='color:grey;font-size:14px;margin-left:200px;font-weight:bold'>Your message has been sent</p>";
    rentalScriptRedirect('message.php');
}

$err = rentalDbError($conn);
if ($curlError !== '') {
    $err = $curlError . ($err !== 'Database error' ? ' / ' . $err : '');
}
$_SESSION['message'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Could not save message: "
    . htmlspecialchars($err) . '</p>';
rentalScriptRedirect('bulk-sms.php');
