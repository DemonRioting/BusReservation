<?php 
require('includes/dbconnection.php'); 

$DepartDateTime = $_REQUEST['DepartDateTime']; 
$ArriveDateTime = $_REQUEST['ArriveDateTime']; 

$DepartLocation = $_REQUEST['DepartLocation']; 
$ArriveLocation = $_REQUEST['ArriveLocation']; 

$BuscraftNO = $_REQUEST['BuscraftNO']; 


$sql = "INSERT INTO busschedule SET DepartDateTime = '$DepartDateTime', ArriveDateTime = '$ArriveDateTime', BuscraftNO = '$BuscraftNO'";
$objQuery1 = mysqli_query($con, $sql); 


if ($objQuery1) 
{ 
    echo 'New record Inserted successfully'; 
} else {
    echo 'Errorrrrrrrrrrrrrrrrrrrrrrr';
}

mysqli_close($con);

?>

<?php
    header("Location: AddBusSchedule.php");
?>