<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';

if (!isset($_POST['submitTenant'])) {
    exit;
}

$startdate = mysqli_real_escape_string($conn, $_POST['startDate'] ?? '');
$phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$housenumber = mysqli_real_escape_string($conn, $_POST['houseNumber'] ?? '');
$fname = mysqli_real_escape_string($conn, $_POST['fname'] ?? '');
$mname = mysqli_real_escape_string($conn, $_POST['mname'] ?? '');
$lname = mysqli_real_escape_string($conn, $_POST['lname'] ?? '');
$gender = mysqli_real_escape_string($conn, $_POST['gend'] ?? '');
$kinphone = mysqli_real_escape_string($conn, $_POST['kinPhone'] ?? '');
$address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
$enddate = mysqli_real_escape_string($conn, $_POST['endDate'] ?? '');
$amount = mysqli_real_escape_string($conn, $_POST['amount'] ?? '0');
$contract = mysqli_real_escape_string($conn, $_POST['contract'] ?? '');

$insertTenant = "INSERT INTO tenants(startDate,mobileNumber,email,houseNumber,firstname,middlename,lastname,gender,kinPhone,address,endDate,amount,contract)
    VALUES('$startdate',REPLACE('$phone','-',''),'$email','$housenumber','$fname','$mname','$lname','$gender','$kinphone','$address','$enddate','$amount','$contract')";
$tenantQuery = mysqli_query($conn, $insertTenant);

if ($tenantQuery) {
    $_SESSION['addedTenant'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One tenant added</p>";
    rentalScriptRedirect('tenants.php');
}

$_SESSION['addingTenantError'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error: "
    . htmlspecialchars(rentalDbError($conn)) . '</p>';
rentalScriptRedirect('tenants.php');
