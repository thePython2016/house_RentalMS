<?php
$host="localhost";
$user="root";
$password="";
$dbname="houserentaldb";

$conn=mysqli_connect($host,$user,$password);
mysqli_select_db($conn,$dbname);

if(!$conn)
{
    die("Could not Connect".mysql_connect_error());
}

require_once dirname(__DIR__) . '/inc/ensureSchema.php';
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalInitDb($conn);
ensureRentalSchema($conn);
?>