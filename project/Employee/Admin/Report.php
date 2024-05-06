<?php
session_start();
include('includes/dbconnection.php');
if(strlen($_SESSION['aid']==0)){
	header('location:../logout.php');
}
else {
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Analytic Report</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <?php include_once('includes/header.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Analytic Report</h1>
          </div>

          <!-- Content Row -->

        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr>
            <th>PaymentMethod</th>
            <th>Count</th>
          </tr>

          <?php $ret1=mysqli_query($con,"SELECT COUNT(PaymentID) AS PaymentM FROM payment WHERE PaymentMethod = 'M' GROUP BY PaymentMethod;");
                $ret2=mysqli_query($con,"SELECT COUNT(PaymentID) AS PaymentV FROM payment WHERE PaymentMethod = 'V' GROUP BY PaymentMethod;");
                $ret3=mysqli_query($con,"SELECT COUNT(PaymentID) AS PaymentC FROM payment WHERE PaymentMethod = 'C' GROUP BY PaymentMethod;");
                $ret4=mysqli_query($con,"SELECT COUNT(PaymentID) AS PaymentTotal FROM payment;");
                while ($row1=mysqli_fetch_array($ret1)) {
          ?>

          <tr>
            <td><?php echo 'Master Card';?></td>
            <td><?php echo $row1['PaymentM'];?></td>
          </tr>
          <?php $row2=mysqli_fetch_array($ret2); ?>
          <tr>
            <td><?php echo 'Visa Card';?></td>
            <td><?php echo $row2['PaymentV'];?></td>
          </tr>
          <?php $row3=mysqli_fetch_array($ret3); ?>
          <tr>
            <td><?php echo 'Cash';?></td>
            <td><?php echo $row3['PaymentC'];?></td>
          </tr>
          <?php $row4=mysqli_fetch_array($ret4); ?>
          <tr>
            <td><?php echo 'Payment Total';?></td>
            <td><?php echo $row4['PaymentTotal'];?></td>
          </tr>

        <?php }?>

        </table>
        

        <br>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr>
            <th>Reservation Status</th>
            <th>Count</th>
          </tr>

          <?php $ret5=mysqli_query($con,"SELECT COUNT(ReservationID) AS cancle FROM reservation WHERE ReservationStatus  = '0';");
                $ret6=mysqli_query($con,"SELECT COUNT(ReservationID) AS confirm FROM reservation WHERE ReservationStatus  = '1';");
                $ret7=mysqli_query($con,"SELECT COUNT(ReservationID) AS ReservationTotal FROM reservation WHERE ReservationStatus  = '0' || ReservationStatus  = '1';");
                while ($row5=mysqli_fetch_array($ret5)) {
          ?>

          <tr>
            <td><?php echo 'Reservation Cancle';?></td>
            <td><?php echo $row5['cancle'];?></td>
          </tr>

          <?php $row6=mysqli_fetch_array($ret6); ?>
          <tr>
            <td><?php echo 'Reservation Confirm';?></td>
            <td><?php echo $row6['confirm'];?></td>
          </tr>
          <?php $row7=mysqli_fetch_array($ret7); ?>
          <tr>
            <td><?php echo 'Reservation Total';?></td>
            <td><?php echo $row7['ReservationTotal'];?></td>
          </tr>

        <?php }?>

        </table>


        <br>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr>
            <th>Gender of Passenger</th>
            <th>Count</th>
          </tr>

          <?php $ret8=mysqli_query($con,"SELECT COUNT(PassengerID) AS male FROM Passenger WHERE PassengerGender  = 'M';");
                $ret9=mysqli_query($con,"SELECT COUNT(PassengerID) AS female FROM Passenger WHERE PassengerGender  = 'F';");
                $ret10=mysqli_query($con,"SELECT COUNT(PassengerID) AS other FROM Passenger WHERE PassengerGender  = 'O';");
                $ret11=mysqli_query($con,"SELECT COUNT(PassengerID) AS GenderTotal FROM Passenger;");
                while ($row8=mysqli_fetch_array($ret8)) {
          ?>

          <tr>
            <td><?php echo 'Male';?></td>
            <td><?php echo $row8['male'];?></td>
          </tr>

          <?php $row9=mysqli_fetch_array($ret9); ?>
          <tr>
            <td><?php echo 'Female';?></td>
            <td><?php echo $row9['female'];?></td>
          </tr>
          <?php $row10=mysqli_fetch_array($ret10); ?>
          <tr>
            <td><?php echo 'Other';?></td>
            <td><?php echo $row10['other'];?></td>
          </tr>
          <?php $row11=mysqli_fetch_array($ret11); ?>
          <tr>
            <td><?php echo 'Gender Total';?></td>
            <td><?php echo $row11['GenderTotal'];?></td>
          </tr>


        <?php }?>

        </table>


        <br>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr>
            <th>Employee</th>
            <th>Count</th>
          </tr>

          <?php $ret12=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emBKK FROM employeeinfo WHERE BusstationID = 'BKK';");
                $ret13=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emCMI FROM employeeinfo WHERE BusstationID = 'CMI';");
                $ret14=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emKKN FROM employeeinfo WHERE BusstationID = 'KKN';");
                $ret15=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emNRT FROM employeeinfo WHERE BusstationID = 'NRT';");
                $ret16=mysqli_query($con,"SELECT COUNT(EmployeeID) AS EmployeeTotal FROM employeeinfo;");
                while ($row12=mysqli_fetch_array($ret12)) {
          ?>

          <tr>
            <td><?php echo 'Employee BKK Station';?></td>
            <td><?php echo $row12['emBKK'];?></td>
          </tr>

          <?php $row13=mysqli_fetch_array($ret13); ?>
          <tr>
            <td><?php echo 'Employee CMI Station';?></td>
            <td><?php echo $row13['emCMI'];?></td>
          </tr>
          <?php $row14=mysqli_fetch_array($ret14); ?>
          <tr>
            <td><?php echo 'Employee KKN Station';?></td>
            <td><?php echo $row14['emKKN'];?></td>
          </tr>
          <?php $row15=mysqli_fetch_array($ret15); ?>
          <tr>
            <td><?php echo 'Employee NRT Station';?></td>
            <td><?php echo $row15['emNRT'];?></td>
          </tr>
          <?php $row16=mysqli_fetch_array($ret16); ?>
          <tr>
            <td><?php echo 'Employee Total';?></td>
            <td><?php echo $row16['EmployeeTotal'];?></td>
          </tr>


        <?php }?>

        </table>


        <br>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr>
            <th>Employee Role</th>
            <th>Count</th>
          </tr>

          <?php $ret17=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emADM FROM employeeinfo WHERE EmployeeRole = 'A';");
                $ret18=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emMNG FROM employeeinfo WHERE EmployeeRole = 'M';");
                $ret19=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emHR FROM employeeinfo WHERE EmployeeRole = 'H';");
                $ret20=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emBDV FROM employeeinfo WHERE EmployeeRole = 'D';");
                $ret21=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emBST FROM employeeinfo WHERE EmployeeRole = 'B';");
                $ret22=mysqli_query($con,"SELECT COUNT(EmployeeID) AS emSTF FROM employeeinfo WHERE EmployeeRole = 'S';");
                $ret23=mysqli_query($con,"SELECT COUNT(EmployeeID) AS EmployeeRoleTotal FROM employeeinfo;");
                while ($row17=mysqli_fetch_array($ret17)) {
          ?>

          <tr>
            <td><?php echo 'Admin';?></td>
            <td><?php echo $row17['emADM'];?></td>
          </tr>
          <?php $row18=mysqli_fetch_array($ret18); ?>
          <tr>
            <td><?php echo 'Bus Schedule Manager';?></td>
            <td><?php echo $row18['emMNG'];?></td>
          </tr>
          <?php $row19=mysqli_fetch_array($ret19); ?>
          <tr>
            <td><?php echo 'HR';?></td>
            <td><?php echo $row19['emHR'];?></td>
          </tr>
          <?php $row20=mysqli_fetch_array($ret20); ?>
          <tr>
            <td><?php echo 'Bus Driver';?></td>
            <td><?php echo $row20['emBDV'];?></td>
          </tr>
          <?php $row21=mysqli_fetch_array($ret21); ?>
          <tr>
            <td><?php echo 'Bus Staff';?></td>
            <td><?php echo $row21['emBST'];?></td>
          </tr>
          <?php $row22=mysqli_fetch_array($ret22); ?>
          <tr>
            <td><?php echo 'Staff';?></td>
            <td><?php echo $row22['emSTF'];?></td>
          </tr>
          <?php $row23=mysqli_fetch_array($ret23); ?>
          <tr>
            <td><?php echo 'Employee Role Total';?></td>
            <td><?php echo $row23['EmployeeRoleTotal'];?></td>
          </tr>

        <?php }?>

        </table>


        </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
       <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>

</html>
<?php
}
?>