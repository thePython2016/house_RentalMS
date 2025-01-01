<?php
require 'dbconnection.php';
if(isset($_POST['updateHouses']))
{
    $number=$_POST['houseNumber'];
    $region=$_POST['region'];
    $district=$_POST['district'];
    $address=$_POST['address'];
    $fee=$_POST['rentalFee'];
    $attachment=$_POST['attachment'];
    
    $updated =mysqli_query($conn,"update houses 
    set 

    region='$region',
    district='$district',
    physicalAddress='$address',
    rentalFee='$fee',
    attachment='$attachment'
  
where houseNumber='$number'
    ");
    
    if($updated)
    {

        echo  "
        <script>
        window.location.href='houses-list.php';
        </script>
        ";
    }

    else{
        echo "
        <script>
        alert('Error Occured');
        window.location.href='houses-list.php';
        </script>
        ";
    }
}
// Update tenats
if(isset($_POST['updateTenant']))
{
    $phone=$_POST['mobileNumber'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $kinphone=$_POST['kinphone'];
    $housenumber=$_POST['housenumber'];
    $address=$_POST['address'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $amount=$_POST['amount'];
    $contract=$_POST['contract'];


    $update =mysqli_query($conn,"update tenants
    set 
   startDate='$startdate',
    houseNumber='$housenumber',
 
    firstname='$fname',
    middlename='$mname',
    lastname='$lname',
    gender='$gender',
    kinPhone='$kinphone',
    endDate='$enddate',
    amount='$amount',
 
    address='$address'
 
where mobileNumber='$phone'
    ");
    
    if($update)
    {

        echo  "
        <script>
        window.location.href='tenants-list.php';
        </script>
        ";
    }

    else{
        echo "
        <script>
        alert('Error Occured');
        window.location.href='tenants-list.php';
        </script>
        ";
    }
}
