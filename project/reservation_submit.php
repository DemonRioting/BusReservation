<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}

$form = $_SESSION["form"];
$seatID = $_POST["seatID"];
$paymentMethod = $_POST["paymentMethod"];
$cardID = $_POST["cardID"];
$expireDate = $_POST["expireDate"];
$CVV = $_POST["CVV"];
$subTotal = $_POST["subTotal"];

$errors = array();
if (empty($seatID)) {
    $errors['seatID'] = 'Please select Seat';
}
if (empty($paymentMethod)) {
    $errors['paymentMethod'] = 'Please select Payment Method';
} else {
    if ($paymentMethod == "C") {
        $cardID = NULL;
    } else {
        if(empty($cardID) || empty($expireDate) || empty($CVV)) {
            $errors['paymentMethod'] = 'Please type Payment Method detail';
        }
    }
}


if (!empty($errors)) {
    require 'seatreservation.php';
} else {
    for ($i = 0; $i < $form['noOfPassenger']; $i++) {
        $form["passengers"][$i]["seatID"] = $seatID[$i];
    }

    mysqli_begin_transaction($con);
    try {
        $stmt = mysqli_prepare($con, "INSERT INTO reservation (CustomerID,ReservationStatus) VALUES (?,?)");
        $reservationStatus = "1";
        mysqli_stmt_bind_param($stmt, "is", $_SESSION['uid'], $reservationStatus);
        mysqli_stmt_execute($stmt);
        $reservationID = mysqli_stmt_insert_id($stmt);

        $stmt = mysqli_prepare($con, "INSERT INTO payment (PaymentMethod,PaymentCard,TotalPrice,ReservationID) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssdi", $paymentMethod, $cardID, $subTotal, $reservationID);
        mysqli_stmt_execute($stmt);
        $paymentID = mysqli_stmt_insert_id($stmt);

        foreach ($form["passengers"] as $passenger) {
            $stmt = mysqli_prepare($con, "INSERT INTO passenger (PassengerTitle, PassengerFirstname, PassengerLastname, PassengerDOB, PassengerGender, PassengerNationality, PassengerReligion, PassengerPhone, PassengerIDCard, PassengerEmail) VALUES (?,?,?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt, "ssssssssss", $passenger["passengerTitle"], $passenger["firstName"], $passenger["lastName"], $passenger["birthDate"], $passenger["passengerGender"], $passenger["nationality"], $passenger["religion"], $passenger["phoneNumber"], $passenger["IDCard"], $passenger["email"]);
            mysqli_stmt_execute($stmt);
            $passengerID = mysqli_stmt_insert_id($stmt);

            $stmt = mysqli_prepare($con, "UPDATE seat SET ReservationID = ?,PassengerID = ?,SeatStatus = ? WHERE SeatID = ?");
            $seatStatus = "1";
            mysqli_stmt_bind_param($stmt, "iisi", $reservationID, $passengerID, $seatStatus, $passenger["seatID"]);
            mysqli_stmt_execute($stmt);
        }

        mysqli_commit($con);
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($con);
        throw $exception;
    }

    unset($_SESSION["form"]);
    header('Location: historyreservation.php');
}

?>