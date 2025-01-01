<?php
require 'dbConnection.php';
// HOUSES


if(isset($_POST["addHouses"]))
{
$housenumber=mysqli_real_escape_string($conn,$_POST['houseNumber']);
$region=mysqli_real_escape_string($conn,$_POST['region']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$fee=mysqli_real_escape_string($conn,$_POST['rentalFee']);
// $attachment=mysqli_real_escape_string($conn,$_POST['attachment']);

if($_FILES['attachment']['name']){
  move_uploaded_file($_FILES['attachment']['tmp_name'], "property documents/".$_FILES['attachment']['name']);
  $attachment="property documents/".$_FILES['attachment']['name'];
}
   

// INSERT TO TABLE
$insertHouses="insert into houses(houseNumber,region,district,physicalAddress,rentalFee,attachment,name) 
values('$housenumber','$region','$district','$address','$fee','$attachment',(select name from regions where name='$region'))";

$housesQuery=mysqli_query($conn,$insertHouses);


// Count houses

$countHouses=mysqli_query($conn,"select count(houseNumber) as countHouses from houses GROUP BY region
");

foreach($countHouses as $count)
{
  $numberOfhouses=$count['countHouses'];
  echo $numberOfhouses;

}
// Update regions table after insertion of house
$updateRegiontable=mysqli_query($conn,"update  regions
SET marks=marks+'$numberOfhouses'

WHERE name='$region'
");
// $count=mysqli_num_rows($farmersQuery);

if($housesQuery)
{
  $_SESSION['addedHouse']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Farmer added</p>";
  echo "<script>
  window.location.href='houses.php'
  </script>";
  
  
  
}
else{
  $_SESSION['addingHouseError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}



}


// <!-- Rental fees -->


if(isset($_POST["addRental"]))
{
$id=mysqli_real_escape_string($conn,$_POST['id']);
$housenumber=mysqli_real_escape_string($conn,$_POST['houseNumber']);
$rental=mysqli_real_escape_string($conn,$_POST['rentalFee']);
// INSERT TO TABLE
$insertRentals="insert into rentalFees(id,houseNumber,rentalFee) 
values('$id','$housenumber','$rental')";

$housesRentals=mysqli_query($conn,$insertRentals);

// $count=mysqli_num_rows($farmersQuery);

if($housesRentals)
{
  $_SESSION['addedRental']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Record added</p>";
  echo "<script>
  window.location.href='houses.php'
  </script>";
  
  
  
}
else{
  $_SESSION['addingRentalError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}



}


// <!-- tenants -->
if(isset($_POST["submitTenant"]))
{
  



$startdate=mysqli_real_escape_string($conn,$_POST['startDate']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$housenumber=mysqli_real_escape_string($conn,$_POST['houseNumber']);
$fname=mysqli_real_escape_string($conn,$_POST['fname']);

$mname=mysqli_real_escape_string($conn,$_POST['mname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$gender=mysqli_real_escape_string($conn,$_POST['gend']);
$kinphone=mysqli_real_escape_string($conn,$_POST['kinPhone']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$enddate=mysqli_real_escape_string($conn,$_POST['endDate']);
$amount=mysqli_real_escape_string($conn,$_POST['amount']);
// $contract=mysqli_real_escape_string($conn,$_POST['contract']);

if($_FILES['contract']['name']){
  move_uploaded_file($_FILES['contract']['tmp_name'], "contracts/".$_FILES['contract']['name']);
  $contract="contracts/".$_FILES['contract']['name'];
}
   

// INSERT TO TABLE
$insertTenant="insert into tenants(startDate,mobileNumber,email,houseNumber,firstname,middlename,lastname,gender,kinPhone,address,endDate,Amount,contract) 
values('$startdate',replace('$phone', '-', ''),'$email','$housenumber','$fname','$mname','$lname','$gender','$kinphone','$address','$enddate','$amount','$contract')";

$tenantQuery=mysqli_query($conn,$insertTenant);

// $count=mysqli_num_rows($farmersQuery);

if($tenantQuery)
{
  $_SESSION['addedTenant']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Tenant added</p>";
  echo "<script>
  window.location.href='tenants.php'
  </script>";
  
  
  
}
else{
  echo "Error";
  $_SESSION['addingTenantError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}
}

// Add payments
if(isset($_POST['addPayment']))
{
  $paymentnumber=$_POST['paymentNumber'];
  // $startdate=$_POST['startDate'];
  // $enddate=$_POST['endDate'];
  $tenant=$_POST['tenant'];
  $amount=$_POST['amount'];

  // INSERT TO TABLE
$insertPayment="insert into rentalPayments(paymentNumber,amount,mobileNumber) 
values('$paymentnumber','$amount','$tenant')";

$tenantQuery=mysqli_query($conn,$insertPayment);
if($tenantQuery)
{
  $_SESSION['addedPayment']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>One Tenant added</p>";
  echo "<script>
  window.location.href='rental-payments.php'
  </script>";
  
  
  
}
else{
  $_SESSION['addingPaymentError']="<p style='color:red;font-size:14px;margin-left:200px;font-weight:bold'>Error </p>";
}

}
?>
