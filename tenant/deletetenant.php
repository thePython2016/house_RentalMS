<?php

require "dbconnection.php";
$id=$_GET['phone'];
  
$delete=mysqli_query($conn,"delete from tenants where mobileNumber='$id'");
if($delete)
{
    echo "<script>
    
    window.location.href='tenants-list.php';
    </script>";
}
else 
{
    echo "<script>
    
    window.location.href='tenants-list.php';
    </script>";
}



?>