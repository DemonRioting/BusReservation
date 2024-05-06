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

$passengerTitle2 = $_POST["passengerTitle2"];
$firstName2 = $_POST["firstName2"];
$passengerGender2 = $_POST["passengerGender2"];
$lastName2 = $_POST["lastName2"];
$birthDate2 = $_POST["birthDate2"];
$nationality2 = $_POST["nationality2"];
$religion2 = $_POST["religion2"];
$IDCard2 = $_POST["IDCard2"];
$email2 = $_POST["email2"];
$phoneNumber2 = $_POST["phoneNumber2"];

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

if (empty($passengerTitle2)) {
    $errors['passengerTitle2'] = 'Please select Title';
}
if (empty($firstName2)) {
    $errors['firstName2'] = 'Please type First Name';
}
if (empty($passengerGender2)) {
    $errors['passengerGender2'] = 'Please select Gender';
}
if (empty($lastName2)) {
    $errors['lastName2'] = 'Please type Last Name';
}
if (empty($birthDate2)) {
    $errors['birthDate2'] = 'Please select Birth Date';
}
if (empty($nationality2)) {
    $errors['nationality2'] = 'Please type Nationality';
}
if (empty($religion2)) {
    $errors['religion2'] = 'Please type Religion';
}
if (empty($IDCard2)) {
    $IDCard2 = NULL;
}
if (empty($email2)) {
    $errors['email2'] = 'Please type Email';
}
if (empty($phoneNumber2)) {
    $phoneNumber2 = NULL;
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
    array_push($form["passengers"], array(
        "passengerTitle" => $passengerTitle2,
        "firstName" => $firstName2,
        "passengerGender" => $passengerGender2,
        "lastName" => $lastName2,
        "birthDate" => $birthDate2,
        "nationality" => $nationality2,
        "religion" => $religion2,
        "IDCard" => $IDCard2,
        "email" => $email2,
        "phoneNumber" => $phoneNumber2
    ));
    $_SESSION["form"] = $form;
    header('Location: seatreservation.php');
}

?>