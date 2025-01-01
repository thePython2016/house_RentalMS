<?php
require('dbconnection.php');

use SimpleExcel\SimpleExcel;
if(isset($_POST['importTenants']))
{
    if(move_uploaded_file($_FILES['importFile']['tmp_name'],"imported/".$_FILES['importFile']['name']))
{
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile("imported/"  .$_FILES['importFile']['name']);           
    

    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){

  $startdate=$foo[$count][0];
  $phone=$foo[$count][1];
  $housenumber=$foo[$count][2];
  $fname=$foo[$count][3];
  $mname=$foo[$count][4];
  $lname=$foo[$count][5];
  $gender=$foo[$count][6];
  $kinphone=$foo[$count][7];
  $address=$foo[$count][8];
  $enddate=$foo[$count][9];
  $amount=$foo[$count][10];
  $contract=$foo[$count][11];



 





// INSERT TO TABLE
$insertTenant="insert into tenantS(startDate,mobileNumber,houseNumber,firstname,middlename,lastname,gender,kinPhone,address,endDate,amount,contract) 
values('$startdate','$phone','$housenumber','$fname','$mname','$lname','$gender','$kinphone','$address','$enddate','$amount','$contract')";

$tenantQuery=mysqli_query($conn,$insertTenant);
        $count++;

    

        if($tenantQuery)
        {
            echo "
            <script>
            alert('Imported Successfully')
            window.location.href='tenants.php'
            </script>
            ";
        }
        else
        {
            echo "<script>
            alert('Error')
             window.location.href='tenants.php'
            </script>";
        }

    }              


}

  

}
?>