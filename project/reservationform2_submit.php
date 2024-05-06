<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}

$form = $_SESSION["form"];

$departTime = $_POST["departTime"];

$errors = array();
if (empty($departTime)) {
    $errors['departTime'] = 'Please select Depart Time';
}

if (empty($errors)) {
    $stmt = mysqli_prepare($con, "SELECT count(*) FROM seat WHERE BusScheduleID = ? and SeatStatus = ?");
    $seatStatus = "0";
    mysqli_stmt_bind_param($stmt, "ds", $departTime, $seatStatus);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $seats = mysqli_fetch_row($result)[0];
    mysqli_free_result($result);
    if ($seats <= $form['noOfPassenger']) {
        $errors['departTime'] = "insufficiant seat(s) $seats < " . $form['noOfPassenger'];
    }
}

if (!empty($errors)) {
    require 'reservationform2.php';
} else {
    $form["departTime"] = $departTime;
    $_SESSION["form"] = $form;
    if ($form['noOfPassenger'] == 1) {
        header('Location: passengerinfo.php');
    } else if ($form['noOfPassenger'] == 2) {
        header('Location: passengerinfo2.php');
    } else {
        require 'reservationform2.php';
    }
}

?>