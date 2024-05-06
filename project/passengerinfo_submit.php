<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}

$form = $_SESSION["form"];

$passengerTitle = $_POST["passengerTitle"];
$firstName = $_POST["firstName"];
$passengerGender = $_POST["passengerGender"];
$lastName = $_POST["lastName"];
$birthDate = $_POST["birthDate"];
$nationality = $_POST["nationality"];
$religion = $_POST["religion"];
$IDCard = $_POST["IDCard"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];

$errors = array();
if (empty($passengerTitle)) {
    $errors['passengerTitle'] = 'Please select Title';
}
if (empty($firstName)) {
    $errors['firstName'] = 'Please type First Name';
}
if (empty($passengerGender)) {
    $errors['passengerGender'] = 'Please select Gender';
}
if (empty($lastName)) {
    $errors['lastName'] = 'Please type Last Name';
}
if (empty($birthDate)) {
    $errors['birthDate'] = 'Please select Birth Date';
}
if (empty($nationality)) {
    $errors['nationality'] = 'Please type Nationality';
}
if (empty($religion)) {
    $errors['religion'] = 'Please type Religion';
}
if (empty($IDCard)) {
    $IDCard = NULL;
}
if (empty($email)) {
    $errors['email'] = 'Please type Email';
}
if (empty($phoneNumber)) {
    $phoneNumber = NULL;
}

if (!empty($errors)) {
    require 'passengerinfo.php';
} else {
    $form["passengers"] = array();
    array_push($form["passengers"], array(
        "passengerTitle" => $passengerTitle,
        "firstName" => $firstName,
        "passengerGender" => $passengerGender,
        "lastName" => $lastName,
        "birthDate" => $birthDate,
        "nationality" => $nationality,
        "religion" => $religion,
        "IDCard" => $IDCard,
        "email" => $email,
        "phoneNumber" => $phoneNumber
    ));
    $_SESSION["form"] = $form;
    header('Location: seatreservation.php');
}

?>