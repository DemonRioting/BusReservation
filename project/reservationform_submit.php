<?php
include_once('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
	header('location:logout.php');
	exit();
}

$date = $_POST["date"];
$noOfPassenger = $_POST["noOfPassenger"];
$from = $_POST["from"];
$to = $_POST["to"];

$errors = array();
if (empty($date)) {
    $errors['date'] = 'Please Type Depart Date';
}
if (empty($noOfPassenger)) {
    $errors['noOfPassenger'] = 'may not be empty';
}
if (empty($from)) {
    $errors['from'] = 'may not be empty';
} else {
    if (!in_array($from, array('BKK', 'CMI', 'KKN', 'NRT'))) {
        $errors['from'] = "invalid value '$from'";
    }
}
if (empty($to)) {
    $errors['to'] = 'may not be empty';
} else {
    if (!in_array($from, array('BKK', 'CMI', 'KKN', 'NRT'))) {
        $errors['to'] = "invalid value '$to'";
    }
}

if (empty($errors)) {
    $today = strtotime(date('Y-m-d'));
    $parsed = strtotime($date);
    if ($parsed < $today) {
        $errors['date'] = 'past';
    } else {
        $start_time = $date." 00:00:00.000";
        $end_time = $date." 23:59:59.999";
        $now = date("Y-m-d H:i:s.u");
        $stmt = mysqli_prepare($con, "SELECT BusScheduleID, DepartDateTime, DepartLocation, ArriveLocation
                FROM busschedule
                WHERE DepartLocation = ? 
                AND ArriveLocation = ?
                AND DepartDateTime > ?
                AND DepartDateTime BETWEEN ? and ?");
        mysqli_stmt_bind_param($stmt, "sssss", $from, $to, $now, $start_time, $end_time);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_num_rows($result);
        if ($row <= 0) {
            $errors['from'] = 'invalid depart';
            $errors['to'] = 'invalid arrive';
        }
        mysqli_free_result($result);

        mysqli_close($con);
    }
}

if (!empty($errors)) {
    require 'reservationform.php';
} else {
    $_SESSION["form"] = array(
        "date" => $date,
        "noOfPassenger" => $noOfPassenger,
        "from" => $from,
        "to" => $to
    );
    header('Location: reservationform2.php');
}

?>
