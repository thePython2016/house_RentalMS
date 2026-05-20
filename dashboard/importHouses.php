<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';
use SimpleExcel\SimpleExcel;

if (!isset($_POST['uploadHouses'])) {
    exit;
}

if (!move_uploaded_file($_FILES['import']['tmp_name'], 'imported/' . $_FILES['import']['name'])) {
    rentalAlertRedirect('houses.php', 'Could not upload file.');
}

require_once 'SimpleExcel/SimpleExcel.php';
$excel = new SimpleExcel('csv');
$excel->parser->loadFile('imported/' . $_FILES['import']['name']);

$count = 1;
$foo = $excel->parser->getField();
$imported = 0;
$failed = 0;

while (count($foo) > $count) {
    $number = mysqli_real_escape_string($conn, $foo[$count][0] ?? '');
    $region = mysqli_real_escape_string($conn, $foo[$count][1] ?? '');
    $district = mysqli_real_escape_string($conn, $foo[$count][2] ?? '');
    $address = mysqli_real_escape_string($conn, $foo[$count][3] ?? '');
    $fee = '0';
    $attachment = mysqli_real_escape_string($conn, $foo[$count][4] ?? '');

    $insertHouses = "INSERT INTO houses(houseNumber,region,district,physicalAddress,rentalFee,attachment,name)
        VALUES('$number','$region','$district','$address','$fee','$attachment','$region')";
    if (mysqli_query($conn, $insertHouses)) {
        syncRegionMarks($conn, $region);
        $imported++;
    } else {
        $failed++;
    }
    $count++;
}

rentalAlertRedirect('houses.php', "Imported $imported house(s)." . ($failed ? " $failed failed." : ''));
