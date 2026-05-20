<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';

$id = mysqli_real_escape_string($conn, $_GET['phone'] ?? '');
$delete = mysqli_query($conn, "DELETE FROM tenants WHERE mobileNumber='$id'");

if ($delete) {
    rentalScriptRedirect('tenants-list.php');
}
rentalAlertRedirect('tenants-list.php', 'Delete failed: ' . rentalDbError($conn));
