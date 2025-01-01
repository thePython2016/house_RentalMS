<?php
require('dbconnection.php');
// error_reporting(0);
use SimpleExcel\SimpleExcel;
if(isset($_POST['importRentals']))
{
    if(move_uploaded_file($_FILES['file_']['tmp_name'],"imported/".$_FILES['file_']['name']))
{
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile("imported/"  .$_FILES['file_']['name']);           
    

    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){

  $id=$foo[$count][0];
  $number=$foo[$count][1];
  $amount=$foo[$count][2];


 





// INSERT TO TABLE
$insertRentals="insert into rentalFees(id,houseNumber,rentalFee) 
values('$id','$housenumber','$rental')";

$housesRentals=mysqli_query($conn,$insertRentals);
        $count++;

    

        if($housesRentals)
        {
            echo "
            <script>
            alert('HousesImported Successfully')
            window.location.href='rental-fees.php'
            </script>
            ";
        }

    }              


}

  

}
?>