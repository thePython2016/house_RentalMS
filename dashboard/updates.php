<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';

if (isset($_POST['updateHouses'])) {
    $number = mysqli_real_escape_string($conn, $_POST['houseNumber'] ?? '');
    $region = mysqli_real_escape_string($conn, $_POST['region'] ?? '');
    $district = mysqli_real_escape_string($conn, $_POST['district'] ?? '');
    $address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
    $fee = mysqli_real_escape_string($conn, $_POST['rentalFee'] ?? '0');
    $attachment = mysqli_real_escape_string($conn, $_POST['attachment'] ?? '');

    $updated = mysqli_query(
        $conn,
        "UPDATE houses SET region='$region', district='$district', physicalAddress='$address',
        rentalFee='$fee', attachment='$attachment' WHERE houseNumber='$number'"
    );

    if ($updated) {
        syncRegionMarks($conn, $region);
        rentalScriptRedirect('houses-list.php');
    }
    rentalAlertRedirect('houses-list.php', 'Error: ' . rentalDbError($conn));
}

if (isset($_POST['updateTenant'])) {
    $phone = mysqli_real_escape_string($conn, $_POST['mobileNumber'] ?? '');
    $fname = mysqli_real_escape_string($conn, $_POST['fname'] ?? '');
    $mname = mysqli_real_escape_string($conn, $_POST['mname'] ?? '');
    $lname = mysqli_real_escape_string($conn, $_POST['lname'] ?? '');
    $gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
    $kinphone = mysqli_real_escape_string($conn, $_POST['kinphone'] ?? '');
    $housenumber = mysqli_real_escape_string($conn, $_POST['housenumber'] ?? '');
    $address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
    $startdate = mysqli_real_escape_string($conn, $_POST['startdate'] ?? '');
    $enddate = mysqli_real_escape_string($conn, $_POST['enddate'] ?? '');
    $amount = mysqli_real_escape_string($conn, $_POST['amount'] ?? '0');

    $update = mysqli_query(
        $conn,
        "UPDATE tenants SET startDate='$startdate', houseNumber='$housenumber', firstname='$fname',
        middlename='$mname', lastname='$lname', gender='$gender', kinPhone='$kinphone',
        endDate='$enddate', amount='$amount', address='$address' WHERE mobileNumber='$phone'"
    );

    if ($update) {
        rentalScriptRedirect('tenants-list.php');
    }
    rentalAlertRedirect('tenants-list.php', 'Error: ' . rentalDbError($conn));
}
