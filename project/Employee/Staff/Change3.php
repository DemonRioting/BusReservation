<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:../logout.php');
  } else{
    $PassengerID = $_GET['passID1'];
    $reservationid = $_GET['reserve'];
    $DPL = $_GET['depart'];
    $ARL = $_GET['arrive'];
    
  if(isset($_POST['submit']))
    {
    
      $query=mysqli_query($con, "UPDATE seat SET PassengerID = NULL, ReservationID = NULL, SeatStatus ='0' WHERE ReservationID ='$_GET[reserve]' "); 
      $query2=mysqli_query($con, "UPDATE seat SET ReservationID ='$_GET[reserve]', PassengerID = '$_GET[passID1]' , SeatStatus ='1' WHERE SeatNO ='$_POST[seatNO]' AND BusScheduleID = '$_POST[BSN]'"); 
       
      if ($query && $query2 ) {
      $msg="Ticket has been updated.";
    }
    else
      {
        $msg="Something Went Wrong. Please try again.";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Change Bus Schedule</title>

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
            <h1 class="h3 mb-0 text-gray-800">Change Bus Schedule</h1>
            
                   </div>
          <!-- Content Row -->
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php
                    mysqli_query( $con, "SET NAMES UTF8" );
                    $sql = " SELECT * FROM reservation;";
                    $result = mysqli_query($con, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    $sql2 = " SELECT * FROM busschedule;";
                    $result2 = mysqli_query($con, $sql2);
                    $resultcheck2 = mysqli_num_rows($result2);

                    #echo $_GET['reserve'];
                    #echo $_GET['passID1'];
                    #echo $_POST['seatNO'];
                    ?>  
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                      Reservation ID : <input type="text" class="form-control form-control-user" name="reservation2" id="reservation2" value="<?php  echo $_GET['reserve']; ?>" readonly/><br>              
                      Bus Schedule ID : <input type="text" class="form-control form-control-user" name="busSchedule2" id="busSchedule2" value="<?php  echo $_GET['busSche']; ?>" readonly/><br>
                      Passenger ID : <input type="text" class="form-control form-control-user" name="passID2" id="passID2" value="<?php  echo $_GET['passID1']; ?>" readonly/>                
                    </div>                    
                    </div>               
                  </div>
                </div>
              </div>
            </div>
                <?php 

                    $ret2=mysqli_query($con,"SELECT * FROM busschedule WHERE DepartLocation = '$DPL' AND ArriveLocation = '$ARL'");
                    $row2=mysqli_fetch_array($ret2);
                    $BSN=$row2['BusScheduleID'];
                    
                
                    $ret3=mysqli_query($con,"SELECT * FROM seat WHERE SeatStatus = '0' ");
                    $row3=mysqli_fetch_array($ret3);
                    $SeatNO2 = $row3['SeatNO'];

                    ?>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Passenger</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><input type="text" class="form-control form-control-user" name="passenger" id="passenger" value="<?php echo $_GET['passenger'] ?>" readonly/></div>
                        
                      </div>               
                  </div>
                </div>
              </div>
            </div>
                
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bus Schedule</div>      
                                
                            <form method="post" action=" ">
                                 <?php                                                              
                                  $reservationid=$_GET['reserve'];
                                  $ret4=mysqli_query($con,"SELECT * FROM seat WHERE ReservationID='$reservationid'");
                                  $cnt=1;
                                  while ($row=mysqli_fetch_array($ret4)) { 
                                  ?>
                                
                                  <input type="text" class="form-control form-control-user" name="where" id="where" value="<?php echo "$DPL"." -> "."$ARL"; ?>" readonly/>
                                
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><br>Bus Schedule ID :                                       
						                    <select id="BSN" name="BSN" class="form-control" required>
							                    <option value ="<?php echo $_GET['busSche']; ?>"><?php echo $_GET['busSche']; ?>(เดิม)</option>
							                    <?php foreach($ret2 as $row){?>
                                                <option value = "<?php echo $row["BusScheduleID"];?>">
                                                <?php echo $row["BusScheduleID"]; ?>
                                                </option>
                                                <?php } ?>
					                        </select>                   					                                                   
                                  </div>

                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><br>Seat No. :                                       
						                    <select id="seatNO" name="seatNO" class="form-control" required>
							                    <option>เลือกที่นั่ง</option>
							                    <?php foreach($ret3 as $row){?>
                                                <option value = "<?php echo $row["SeatNO"];?>">
                                                <?php echo "(".$row["BusScheduleID"].")".$row["SeatNO"]; ?>
                                                </option>
                                                <?php } ?>
					                        </select>                   					                                                   
                                    </div><script>
                                    function onClick(){
                                      alert("Change Complete");
                                    }</script>
                                    <?php } ?>
                                    <br><input type="submit" name="submit"  value="Change" onclick="onClick()" class="btn btn-primary btn-user btn-block">
                                    
                                </form>
                            </div>               
                        </div>
                    </div>
                </div>
            </div>

            

          <!-- Content Row -->

        </div>
          

         
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