<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{  
    
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>History Reservation</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">History Reservation</h1>
                   </div>


 <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>No.</th>
  <th>ReservationID</th>
  <th>BusScheduleID</th>
  <th>Firstname</th>
  <th>Lastname</th>
  <th>CheckInTime</th>
  <th>Status</th>
  <th>Action</th>
  
</tr>

<?php
$CustomerID=$_SESSION['uid'];

$ret1=mysqli_query($con,"SELECT Reservation.ReservationID, Reservation.ReservationStatus, Seat.BusScheduleID, Passenger.PassengerFirstname, Passenger.PassengerLastname, Passenger.CheckInTime
FROM (Seat INNER JOIN Reservation ON  Seat.ReservationID=Reservation.ReservationID) 
    INNER JOIN Passenger ON Seat.PassengerID = Passenger.PassengerID;");

if(isset($_POST['confirm']))
{
$query=mysqli_query($con,"select ReservationStatus from Reservation where ReservationStatus ='1'");
$a=mysqli_fetch_array($query);
if($a>0){
$ret=mysqli_query($con,"update Reservation set ReservationStatus='3'where ReservationStatus ='1'");
}
}

$cnt=1;
while ($row1=mysqli_fetch_array($ret1)) {


?>

<tr>
  <td><?php echo $cnt;?></td>
  <td><?php  echo $row1['ReservationID'];?></td>
   <td><?php echo $row1['BusScheduleID'];?></td>
    <td><?php echo $row1['PassengerFirstname'];?></td>
  <td><?php echo $row1['PassengerLastname'];?></td>
  <td><?php echo $row1['CheckInTime'];?></td>
  <td><?php  $accountstatus=$row1['ReservationStatus'];                                      
if($accountstatus==0):
    echo "Cancel";
    elseif($accountstatus==1):
        echo "Confirm";
        elseif($accountstatus==2):
            echo "Change";
            elseif($accountstatus==3):
                echo "Pending Cancel";
                elseif($accountstatus==4):
                  echo "Cancel Failure";

endif;
    ?>
    </td><form class="user" method="post" action="">
    <td> <input type="submit" onclick="myFunction()" name="confirm"  value="cancel" class="btn btn-primary btn-user btn-block">
     </td></form>
</tr>
<script>
function myFunction()
{
    alert("Request cancel successfully"); // this is the message in ""
} 

</script>

<?php 
$cnt=$cnt+1;
}?>

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

</html>
<?php
}
?>