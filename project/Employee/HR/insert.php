<?php 
require('includes/dbconnection.php'); 

$EmployeeRole =  $_REQUEST['EmployeeRole']; 
$IDCard = $_REQUEST['IDCard']; 
$Title =  $_REQUEST['Title']; 
$Firstname = $_REQUEST['Firstname']; 
$Lastname = $_REQUEST['Lastname']; 
$EmployeeGender = $_REQUEST['EmployeeGender'];
$Height = $_REQUEST['Height']; 
$Weights = $_REQUEST['Weights']; 
$DOB = $_REQUEST['DOB']; 
$BusStationID = $_REQUEST['BusStationID'];
$StartDate = $_REQUEST['StartDate']; 
$Salary = $_REQUEST['Salary']; 
$Addresses = $_REQUEST['Addresses']; 
$Phone = $_REQUEST['Phone']; 
$Email = $_REQUEST['Email']; 
$Degree = $_REQUEST['Degree']; 
$Academy = $_REQUEST['Academy']; 
$Faculty = $_REQUEST['Faculty']; 
$Department = $_REQUEST['Department']; 
$DiseaseName = $_REQUEST['DiseaseName']; 
$NoteDisease = $_REQUEST['NoteDisease']; 

$sql1 = "INSERT INTO employeeinfo SET EmployeeRole = '$EmployeeRole', Username = '$Firstname', Passwords = '12345', Title = '$Title', Firstname = '$Firstname',Lastname = '$Lastname', 
IDCard = '$IDCard', DOB = '$DOB', BusStationID = '$BusStationID', Height = '$Height', Weights = '$Weights',StartDate = '$StartDate', Salary = '$Salary', Email = '$Email', Phone = '$Phone', Addresses = '$Addresses', 
EmployeeGender = '$EmployeeGender'";

$objQuery1 = mysqli_query($con, $sql1); 

$LastID = mysqli_insert_id($con);

$sql2 = "INSERT INTO education SET EmployeeID = '$LastID', Degree = '$Degree', Academy = '$Academy', Faculty = '$Faculty',Department = '$Department'";

$objQuery2 = mysqli_query($con, $sql2); 

$sql3 = "INSERT INTO disease SET EmployeeID = '$LastID', DiseaseName = '$DiseaseName',NoteDisease = '$NoteDisease'";

$objQuery3 = mysqli_query($con, $sql3); 


if ($objQuery1&&$objQuery2&&$objQuery3) 
{ 
    echo 'New record Inserted successfully'; 
} else {
    echo 'Error : Input';
}

mysqli_close($con);

?>

<?php
    header("Location: AddEmployee.php");
?>