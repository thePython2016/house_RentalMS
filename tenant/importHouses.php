<?php
require('dbconnection.php');
// error_reporting(0);
use SimpleExcel\SimpleExcel;
if(isset($_POST['uploadHouses']))
{
    if(move_uploaded_file($_FILES['import']['tmp_name'],"imported/".$_FILES['import']['name']))
{
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile("imported/"  .$_FILES['import']['name']);           
    

    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){

  $number=$foo[$count][0];
  $region=$foo[$count][1];
  $district=$foo[$count][2];
  $address=$foo[$count][3];
  $fee=$foo[$count][4];
  $attachment=$foo[$count][4];

 





// INSERT TO TABLE
$insertHouses="insert into houses(houseNumber,region,district,physicalAddress,rentalFee,attachment) 
values('$number','$region','$district','$address','$fee','$attachment')";

$housesQuery=mysqli_query($conn,$insertHouses);
        $count++;

    

        if($housesQuery)
        {
            echo "
            <script>
            alert('HousesImported Successfully')
            window.location.href='houses.php'
            </script>
            ";
        }

    }              


}

  

}
?>