<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';
use SimpleExcel\SimpleExcel;

if (!isset($_POST['importRentals'])) {
    exit;
}

if (!move_uploaded_file($_FILES['file_']['tmp_name'], 'imported/' . $_FILES['file_']['name'])) {
    rentalAlertRedirect('rental-fees.php', 'Could not upload file.');
}

require_once 'SimpleExcel/SimpleExcel.php';
$excel = new SimpleExcel('csv');
$excel->parser->loadFile('imported/' . $_FILES['file_']['name']);

$count = 1;
$foo = $excel->parser->getField();
$imported = 0;
$failed = 0;

while (count($foo) > $count) {
    $housenumber = mysqli_real_escape_string($conn, $foo[$count][1] ?? '');
    $rental = mysqli_real_escape_string($conn, $foo[$count][2] ?? '0');

    $insertRentals = "INSERT INTO rentalFees(houseNumber,rentalFee) VALUES('$housenumber','$rental')";
    if (mysqli_query($conn, $insertRentals)) {
        $imported++;
    } else {
        $failed++;
    }
    $count++;
}

rentalAlertRedirect('rental-fees.php', "Imported $imported rental fee(s)." . ($failed ? " $failed failed." : ''));
