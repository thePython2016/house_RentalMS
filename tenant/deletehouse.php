<?php

require "dbconnection.php";

if(isset($_GET['number'])){

$id=$_GET['number'];
  


$regionsSelect=mysqli_query($conn,"select * from houses where houseNumber='$id'");
foreach($regionsSelect as $selectedregion)
{
    $selected=$selectedregion['district'];

 
}
$delete=mysqli_query($conn,"delete from houses where houseNumber='$id'");
$updateHouses=mysqli_query($conn,"update regions
SET marks=marks-1 where name='$selected'");

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