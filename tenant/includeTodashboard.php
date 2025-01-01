<?php
require 'dbconnection.php';
$selectTenants=mysqli_query($conn,"select count()");

// Tenants
$countTenants=mysqli_query($conn,"select count(mobileNumber) as tenantCount from tenants");
foreach($countTenants as $tenants)
{
    $tenantCount=$tenants['tenantCount'];
}
// Houses
$countHouses=mysqli_query($conn,"select count(houseNumber) as houseCount from houses");
foreach($countHouses as $houses)
{
    $housesCount=$houses['houseCount'];
}

// Revenue

$selectDate=mysqli_query($conn,"select startDate from tenants");
foreach($selectDate as $date)
{
    $startdate=$date['startDate'];
}
// Current Year
$currentYear=date('Y');

$countRevenue=mysqli_query($conn,"select sum(amount) as revenueCount from tenants where year(startDate)='$currentYear'");
foreach($countRevenue as $revenues)
{
    $revenueCount=$revenues['revenueCount'];
 
}

// Houses by location

$housesbyLocation=mysqli_query($conn,"select region,count(houseNumber) as houses from houses GROUP BY region");
foreach($housesbyLocation as $house)
{
    $count[]=$house['houses'];
    $region[]=$house['region'];
    $countHouses;
}

// revenue by Months
$sql = "
    SELECT MONTH(startDate) AS month, SUM(amount) AS total_revenue 
    FROM tenants

    GROUP BY month
    ORDER BY month
";

$result = $conn->query($sql);


$months = [];
$revenues = [];

while ($row = $result->fetch_assoc()) {
    $months[] = date('F', mktime(0, 0, 0, $row['month'], 10));  // Convert month number to full month name
    $revenues[] = $row['total_revenue'];  // Total revenue for each month


}
?>