<?php
$host="localhost";
$user="root";
$password="";
$dbname="houserentaldb";

$conn=mysqli_connect($host,$user,$password);
mysqli_select_db($conn,$dbname) or die("Failed to connect". mysqli_connect_error());

require_once __DIR__ . '/inc/ensureSchema.php';
require_once __DIR__ . '/inc/rentalDb.php';
rentalInitDb($conn);
ensureRentalSchema($conn);

?>