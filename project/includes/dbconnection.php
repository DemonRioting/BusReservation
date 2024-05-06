<?php
error_reporting(0);
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

date_default_timezone_set('Asia/Bangkok');

$con=mysqli_connect("Localhost", "root", "", "project");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}


?>
