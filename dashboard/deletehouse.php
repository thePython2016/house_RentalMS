<?php
require_once dirname(__DIR__) . '/inc/rentalDb.php';
rentalEnsureSession();
require 'dbconnection.php';

if(isset($_GET['number'])){

$id=mysqli_real_escape_string($conn, $_GET['number'] ?? '');
$selected = '';
  


$regionsSelect=mysqli_query($conn,"select * from houses where houseNumber='$id'");
foreach($regionsSelect as $selectedregion)
{
    $selected=$selectedregion['region'];

 
}
$delete=mysqli_query($conn,"delete from houses where houseNumber='$id'");
if ($delete && !empty($selected)) {
  syncRegionMarks($conn, $selected);
}
$updateHouses = $delete;

if(($delete) && ($updateHouses))
{
    echo "<script>
    
    window.location.href='houses-list.php';
    </script>";
}
else 
{
    echo "<script>
    
    window.location.href='houses.php';
    </script>";
}


}
?>