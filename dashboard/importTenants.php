<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';
use SimpleExcel\SimpleExcel;

if (!isset($_POST['importTenants'])) {
    exit;
}

if (!move_uploaded_file($_FILES['importFile']['tmp_name'], 'imported/' . $_FILES['importFile']['name'])) {
    rentalAlertRedirect('tenants.php', 'Could not upload file.');
}

require_once 'SimpleExcel/SimpleExcel.php';
$excel = new SimpleExcel('csv');
$excel->parser->loadFile('imported/' . $_FILES['importFile']['name']);

$count = 1;
$foo = $excel->parser->getField();
$imported = 0;
$failed = 0;

while (count($foo) > $count) {
    $startdate = mysqli_real_escape_string($conn, $foo[$count][0] ?? '');
    $phone = mysqli_real_escape_string($conn, $foo[$count][1] ?? '');
    $housenumber = mysqli_real_escape_string($conn, $foo[$count][2] ?? '');
    $fname = mysqli_real_escape_string($conn, $foo[$count][3] ?? '');
    $mname = mysqli_real_escape_string($conn, $foo[$count][4] ?? '');
    $lname = mysqli_real_escape_string($conn, $foo[$count][5] ?? '');
    $gender = mysqli_real_escape_string($conn, $foo[$count][6] ?? '');
    $kinphone = mysqli_real_escape_string($conn, $foo[$count][7] ?? '');
    $address = mysqli_real_escape_string($conn, $foo[$count][8] ?? '');
    $enddate = mysqli_real_escape_string($conn, $foo[$count][9] ?? '');
    $contract = mysqli_real_escape_string($conn, $foo[$count][10] ?? '');
    $amount = mysqli_real_escape_string($conn, $foo[$count][11] ?? '0');

    $insertTenant = "INSERT INTO tenants(startDate,mobileNumber,email,houseNumber,firstname,middlename,lastname,gender,kinPhone,address,endDate,amount,contract)
        VALUES('$startdate',REPLACE('$phone','-',''),'','$housenumber','$fname','$mname','$lname','$gender','$kinphone','$address','$enddate','$amount','$contract')";
    if (mysqli_query($conn, $insertTenant)) {
        $imported++;
    } else {
        $failed++;
    }
    $count++;
}

if ($imported > 0) {
    rentalAlertRedirect('tenants.php', "Imported $imported tenant(s)." . ($failed ? " $failed failed." : ''));
}
rentalAlertRedirect('tenants.php', 'Import failed: ' . rentalDbError($conn));
