<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbConnection.php';

if (isset($_POST['addHouses'])) {
    $housenumber = mysqli_real_escape_string($conn, $_POST['houseNumber'] ?? '');
    $region = mysqli_real_escape_string($conn, $_POST['region'] ?? '');
    $district = mysqli_real_escape_string($conn, $_POST['district'] ?? '');
    $address = mysqli_real_escape_string($conn, $_POST['address'] ?? '');
    $fee = mysqli_real_escape_string($conn, $_POST['rentalFee'] ?? '0');
    $attachment = '';

    if (!empty($_FILES['attachment']['name'])) {
        move_uploaded_file(
            $_FILES['attachment']['tmp_name'],
            'property documents/' . $_FILES['attachment']['name']
        );
        $attachment = mysqli_real_escape_string(
            $conn,
            'property documents/' . $_FILES['attachment']['name']
        );
    }

    $insertHouses = "INSERT INTO houses(houseNumber,region,district,physicalAddress,rentalFee,attachment,name)
        VALUES('$housenumber','$region','$district','$address','$fee','$attachment','$region')";
    $housesQuery = mysqli_query($conn, $insertHouses);

    if ($housesQuery) {
        syncRegionMarks($conn, $region);
        $_SESSION['addedHouse'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One house added</p>";
        rentalScriptRedirect('houses.php');
    }
    $_SESSION['addingHouseError'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error: "
        . htmlspecialchars(rentalDbError($conn)) . '</p>';
    rentalScriptRedirect('houses.php');
}

if (isset($_POST['addRental'])) {
    $housenumber = mysqli_real_escape_string($conn, $_POST['houseNumber'] ?? '');
    $rental = mysqli_real_escape_string($conn, $_POST['rentalFee'] ?? '0');

    $insertRentals = "INSERT INTO rentalFees(houseNumber,rentalFee) VALUES('$housenumber','$rental')";
    $housesRentals = mysqli_query($conn, $insertRentals);

    if ($housesRentals) {
        $_SESSION['addedRental'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One record added</p>";
        rentalScriptRedirect('rental-fees.php');
    }
    $_SESSION['addingRentalError'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error: "
        . htmlspecialchars(rentalDbError($conn)) . '</p>';
    rentalScriptRedirect('rental-fees.php');
}

if (isset($_POST['submitTenant'])) {
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
    $contract = '';

    if (!empty($_FILES['contract']['name'])) {
        move_uploaded_file($_FILES['contract']['tmp_name'], 'contracts/' . $_FILES['contract']['name']);
        $contract = mysqli_real_escape_string($conn, 'contracts/' . $_FILES['contract']['name']);
    }

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
}

if (isset($_POST['addPayment'])) {
    $paymentnumber = mysqli_real_escape_string($conn, $_POST['paymentNumber'] ?? '');
    $tenant = mysqli_real_escape_string($conn, $_POST['tenant'] ?? '');
    $amount = mysqli_real_escape_string($conn, $_POST['amount'] ?? '0');

    $insertPayment = "INSERT INTO rentalPayments(paymentNumber,amount,mobileNumber)
        VALUES('$paymentnumber','$amount','$tenant')";
    $paymentQuery = mysqli_query($conn, $insertPayment);

    if ($paymentQuery) {
        mysqli_query($conn, "UPDATE tenants SET amount=amount+$amount WHERE mobileNumber='$tenant'");
        $_SESSION['addedPayment'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Payment recorded</p>";
        rentalScriptRedirect('rental-payments.php');
    }
    $_SESSION['addingPaymentError'] = "<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error: "
        . htmlspecialchars(rentalDbError($conn)) . '</p>';
    rentalScriptRedirect('rental-payments.php');
}
